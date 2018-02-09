<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sales extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getMPagos($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$id = $data['id'];
			$total = $data['to'];

			$data = array();
			$data['idOrden'] = $id;
			$data['total']	= $total;
			$data['tmp']	= array();

			$query = $this->db->get_where('tipomediopago',array('tmpEstado'=>'AC'));
			if ($query->num_rows() != 0)
				{
					$tmp = $query->result_array();
					//$data['tmp'] = $tmp;
					$data['tmp'] = array();
					foreach ($tmp as $item) {
						$query = $this->db->get_where('mediosdepago',array('medEstado'=>'AC', 'tmpId' => $item['tmpId']));	
						if ($query->num_rows() != 0)
						{
							$tmpD = $query->result_array();
							$item['tmpD'] = $tmpD;
						} else { 
							$item['tmpD'] = array(); 
						}

						$data['tmp'][] = $item;	
					}
				}	
			return $data;
		}
	}

	function setSale($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$srvId 	 = $data['id'];
			$pago 	 = $data['pa'];
			$detalle = $data['dt'];
			$cliId   = $data['cl'];

			//Datos del usuario
			$userdata = $this->session->userdata('user_data');
			$usrId = $userdata[0]['usrId'];

			//Datos de la caja 
			$this->db->select('*');
			$this->db->where(array('cajaCierre'=>null));
			$this->db->from('cajas');
			$query = $this->db->get();
			$result = $query->result_array();
			if(count($result) > 0){
				$result = $query->result_array();
				$cajaId = $result[0]['cajaId'];
			} else {
				return false;
			}

			$venta = array(
				'usrId'			=> $usrId,
				'cajaId'		=> $cajaId,
				'srvId'			=> $srvId,
				'cliId'			=> null
				);

			$this->db->trans_start();
			if($this->db->insert('ventas', $venta) == false) {
				return false;
			} else {
				$idVenta = $this->db->insert_id();
				
				//Actualizar detalle
				foreach ($detalle as $a) {
					$insert = array(
							'venId' 		=> $idVenta,
							'artId' 		=> $a['artId'],
							'artCode' 		=> $a['artProvCode'],
							'artDescription'=> $a['artDescripcion'],
							'artCoste'		=> $a['artCosto'],
							'artFinal'		=> $a['artventa'],
							'venCant'		=> $a['srvdCant']
						);

					if($this->db->insert('ventasdetalle', $insert) == false) {
						return false;
					}

					if($a['actualizaStock'] == 1){
						$insert = array(
								'artId' 		=> $a['artId'],
								'stkCant'		=> $a['srvdCant'] * -1,
								'stkOrigen'		=> 'VN',
								'recId'			=> $idVenta
							);

						if($this->db->insert('stock', $insert) == false) {
							return false;
						}
					}
				}

				//Insertar medios de pago
				//**** Revisar cuando se paga en cuenta corriente 

				foreach ($pago as $item) {
					$insert = array(
							'venId'			=>	$idVenta,
							'medId'			=>	$item['mId'],
							'rcbImporte'	=>	$item['imp'],
							'rcbDesc1'		=>	$item['de1'],
							'rcbDesc2'		=>	$item['de2'],
							'rcbDesc3'		=>	$item['de3']
						);

					if($this->db->insert('recibos', $insert) == false) {
						return false;
					}

					if($item['mId'] == 5){
						//Registrar en cuenta corriente
						$ctacte = array(
								'cctepConcepto'		=>	'Servicio: '.$srvId ,
								'cctepRef'			=>	$srvId,
								'cctepTipo'			=>	'SV',
								'cctepDebe'			=>	$item['imp'],
								'cliId'				=> 	$cliId,
								'usrId'				=>	$userdata[0]['usrId']
							);

						if($this->db->insert('cuentacorrientecliente', $ctacte) == false) {
							return false;
						}
					}
				}

				//Actualizar orden de service
				$update = array('srvEstado' => 'FA');
				if($this->db->update('services', $update, array('srvId'=>$srvId)) == false) {
					return false;
				}
			}
			$this->db->trans_complete();
		}

		return true;
	}
	/*
	function Sale_List(){
		$data = array();
		//verificar si hay cajas abiertas
		$this->db->where('cajaCierre', null);
		$this->db->from('cajas');
		$data['openBox'] = 0;
		if($this->db->count_all_results() > 0){
			$data['openBox'] = 1;
			$this->db->select_max('cajaId');
			$query = $this->db->get('cajas');
			$result = $query->result_array();

			$cajaId = $result[0]['cajaId'];

			$this->db->select('ventas.*, sisusers.usrName, sisusers.usrLastName, sum(ventasdetalle.artFinal * ventasdetalle.venCant ) as ven');
			$this->db->from('ventas');
			$this->db->join('sisusers', ' sisusers.usrId = ventas.usrId');
			$this->db->join('ventasdetalle', ' ventasdetalle.venId = ventas.venId');
			$this->db->order_by('ventas.venId', 'desc');
			$this->db->group_by('ventas.venId');
			$this->db->where('ventas.cajaId', $cajaId);
			$query = $this->db->get();
			$data['data'] = $query->result_array();	
		}else{
			$data['data'] = array();
		}

		return $data;
	}
	
	function getSale($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			//$action = $data['act'];
			$id = $data['id'];

			$data = array();

			$this->db->select('ventas.*, sisusers.usrName, sisusers.usrLastName');
			$this->db->from('ventas');
			$this->db->join('sisusers', 'sisusers.usrId = ventas.usrId');
			$this->db->where(array('ventas.venId'=>$id));
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$m = $query->result_array();
				$data['sale'] = $m[0];
			} else {
				$data['sale'] = array();
			}

			$this->db->select('*');
			$this->db->from('ventasdetalle');
			$this->db->where(array('ventasdetalle.venId'=>$id));
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$data['detail'] = $query->result_array();
			} else {
				$data['detail'] = array();
			}

			return $data;
		}
	}
	
	function setSale($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$userdata = $this->session->userdata('user_data');
			$usrId = $userdata[0]['usrId'];
			$this->db->where('cajaCierre', null);
			$this->db->from('cajas');
			$cajaId = 0;
			if($this->db->count_all_results() > 0){
				$this->db->select_max('cajaId');
				$query = $this->db->get('cajas');
				$result = $query->result_array();

				$cajaId = $result[0]['cajaId'];
			} else {
				return false;
			}

			$arts = $data['articles'];
			
			$data = array(
					   'venFecha'		 	=> date('Y-m-d H:i:s'),
					   'venEstado'			=> 'AC',
					   'usrId'				=> $usrId,
					   'cajaId'				=> $cajaId
					);

			if($this->db->insert('ventas', $data) == false) {
				return false;
			} else {
				$idVenta = $this->db->insert_id();

				foreach ($arts as $a) {
					$insert = array(
							'venId' 		=> $idVenta,
							'artId' 		=> $a['artId'],
							'artCode' 		=> $a['artCode'],
							'artDescription'=> $a['artDescription'],
							'artCoste'		=> $a['artCoste'],
							'artFinal'		=> $a['artFinal'],
							'venCant'		=> $a['venCant']
						);

					if($this->db->insert('ventasdetalle', $insert) == false) {
						return false;
					}

					$insert = array(
							'artId' 		=> $a['artId'],
							'stkCant'		=> $a['venCant'] * -1,
							'stkOrigen'		=> 'VN'
						);

					if($this->db->insert('stock', $insert) == false) {
						return false;
					}
				}
	
			}

			return true;

		}
	}

	function delSale($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$venId = $data['id'];

			//Buscar los articulos de la venta
			$this->db->select('*');
			$this->db->from('ventasdetalle');
			$this->db->where(array('ventasdetalle.venId'=>$venId));
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$detail = $query->result_array();
			} else {
				$detail = array();
			}

			//Cancelar el movimiento de stock 
			foreach ($detail as $a) {
					$insert = array(
									'artId' 		=> $a['artId'],
									'stkCant'		=> $a['venCant'],
									'stkOrigen'		=> 'CV'
								);

					if($this->db->insert('stock', $insert) == false) {
						return false;
					}
			}
			
			//Anular Factura
			$data = array(
			   'venEstado'		=> 'AN'
			);
			if($this->db->update('ventas', $data, array('venId'=>$venId)) == false) {
				return false;
			}
		}

		return true;
	}

	function printSale($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$result = $this->getSale($data);
			

			$venId = str_pad($data['id'], 10, "0", STR_PAD_LEFT);

			$html  = '<label>Nro: </label><b>'.$venId.'</b><br>';
			$date = new DateTime($result['sale']['venFecha']);
			$html .= '<label>Fecha: </label><b>'.$date->format('d-m-Y H:i:s').'</b><br>';
			$html .= '<label>Caja: </label><b>'.str_pad($result['sale']['cajaId'], 10, "0", STR_PAD_LEFT).'</b><br>';
			$html .= '<label>Vendedor: </label><b>'.$result['sale']['usrName'].', '.$result['sale']['usrLastName'].'</b><br>';
			$html .= '<hr>';
			$html .= '<table width="100%">';
			$html .= '<tr><th>Art.</th><th>Precio</th><th>Cant.</th><th>Tot.</th></tr>';
			$total = 0;
			foreach ($result['detail'] as $art) {
				$html .= '<tr>';
				$html .= '<td>'.$art['artCode'].'</td>';
				$html .= '<td style="text-align: right">'.number_format($art['artFinal'], 2, ',', '.').'</td>';
				$html .= '<td style="text-align: right">'.$art['venCant'].'</td>';
				$coste = $art['artFinal'] * $art['venCant'];
				$total += $coste;
				$html .= '<td style="text-align: right">'.number_format($coste, 2, ',', '.').'</td>';
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td colspan="4">'.$art['artDescription'].'</td>';
				$html .= '</tr>';
				$html .= '<tr>';
				$html .= '<td colspan="4" style="padding-top: 5px"> </td>';
				$html .= '</tr>';
			}
			$html .= '<tr><td><h5>Total</h5></td>';
			$html .= '<td colspan="3" style="text-align: right"><h4>'.number_format($total, 2, ',', '.').'</h4></td></tr>';
			$html .= '</table>';
			$html .= '<hr>';

			//se incluye la libreria de dompdf
			require_once("assets/plugin/HTMLtoPDF/dompdf/dompdf_config.inc.php");
			//se crea una nueva instancia al DOMPDF
			$dompdf = new DOMPDF();
			//se carga el codigo html
			$dompdf->load_html(utf8_decode($html));
			//aumentamos memoria del servidor si es necesario
			ini_set("memory_limit","300M"); 
			//Tamaño de la página y orientación 
			$dompdf->set_paper('a6', 'landscape');
			//lanzamos a render
			$dompdf->render();
			//guardamos a PDF
			//$dompdf->stream("TrabajosPedndientes.pdf");
			$output = $dompdf->output();
			file_put_contents('assets/reports/'.$venId.'.pdf', $output);

			//Eliminar archivos viejos ---------------
			$dir = opendir('assets/reports/');
			while($f = readdir($dir))
			{
			 
			if((time()-filemtime('assets/reports/'.$f) > 3600*24*1) and !(is_dir('assets/reports/'.$f)))
			unlink('assets/reports/'.$f);
			}
			closedir($dir);
			//----------------------------------------
			return $venId.'.pdf';
		}
	}
	*/
}
?>