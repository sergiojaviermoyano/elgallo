<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Boxs extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function Box_List($data_ = null){
		$data = array();
		if($data_ == null){
			$this->db->select('cajas.*, sisusers.usrName, sisusers.usrLastName, (select sum(retImporte) from retiros where cajaId = cajas.cajaId) as retiro');
			$this->db->from('cajas');
			$this->db->join('sisusers', ' sisusers.usrId = cajas.usrId');
			$this->db->order_by('cajas.cajaId', 'desc');
			$this->db->limit(10);
			$query= $this->db->get();
			
			$data['page'] = 1;
			$data['totalPage'] = ceil($this->db->count_all_results('cajas') / 10);
			$data['data'] = $query->result_array();
		} else {
			$this->db->select('cajas.*, sisusers.usrName, sisusers.usrLastName, (select sum(retImporte) from retiros where cajaId = cajas.cajaId) as retiro');
			$this->db->from('cajas');
			$this->db->join('sisusers', ' sisusers.usrId = cajas.usrId');
			$this->db->order_by('cajas.cajaId', 'desc');
			$this->db->or_like('cajaId', $data_['txt']);
			$this->db->limit(10, (($data_['page'] - 1) * 10));
			$query= $this->db->get();
			$data['page'] = $data_['page'];
			$data['data'] = $query->result_array();

			$this->db->select('*');
			$this->db->from('cajas');
			$this->db->order_by('cajas.cajaId', 'desc');
			$this->db->or_like('cajaId', $data_['txt']);
			$query= $this->db->get();

			$data['totalPage'] = ceil($query->num_rows() / 10);

		}

		//verificar si hay cajas abiertas
		$this->db->where('cajaCierre', null);
		$this->db->from('cajas');
		$data['openBox'] = $this->db->count_all_results();
		
		return $data;
	}
	
	function getBox($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$action = $data['act'];
			$idBox = $data['id'];

			$data = array();

			//Datos de la caja
			$this->db->select('cajas.*, sisusers.usrId, sisusers.usrName, sisusers.usrLastName');
			$this->db->from('cajas');
			$this->db->join('sisusers', 'sisusers.usrId = cajas.usrId');
			$this->db->where(array('cajas.cajaId'=>$idBox));
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$c = $query->result_array();
				$this->db->select('sum(ventasdetalle.artFinal * ventasdetalle.venCant) as suma', false);
				$this->db->from('ventasdetalle');
				$this->db->join('ventas', 'ventas.venId = ventasdetalle.venId');
				$this->db->where(array('ventas.cajaId'=>$c[0]['cajaId']));
				$query = $this->db->get();
				//var_dump($query->row());
				$c[0]['cajaImpVentas'] = $query->row()->suma == null ? '0.00' : $query->row()->suma;
				$data['box'] = $c[0];

				//Calcular retiros
				$this->db->select('sum(retImporte) as suma', false);
				$this->db->from('retiros');
				$this->db->where(array('cajaId'=>$idBox));
				$query = $this->db->get();
				$data['box']['cajaRetiros'] = $query->row()->suma == null ? '0.00' : $query->row()->suma;

				//calcular ventas
				$this->db->select('sum(ventasdetalle.artFinal * ventasdetalle.venCant) as suma', false);
				$this->db->from('ventasdetalle');
				$this->db->join('ventas', 'ventas.venId = ventasdetalle.venId');
				$this->db->where(array('ventas.cajaId'=>$idBox, 'ventas.venEstado' => 'AC'));
				$query = $this->db->get();
				$data['box']['cajaImpVentas'] = $query->row()->suma == null ? '0.00' : $query->row()->suma;

				$query = $this->db->query('select r.medId, m.medDescripcion, sum(r.rcbImporte) as importe from recibos as r 
										  join ventas as v on v.venId = r.venId
										  join mediosdepago as m on m.medId = r.medId
										  where v.cajaId = '.$idBox.'
										  GROUP BY r.medId');

				$data['box']['medios'] = $query->result_array();

				//Cobros de clientes
				$this->db->select('sum(cuentacorrientecliente.cctepHaber) as suma', false);
				$this->db->from('cuentacorrientecliente');
				$this->db->where(array('cuentacorrientecliente.cajaId'=>$idBox));
				$query = $this->db->get();
				$data['box']['cliente'] = $query->row()->suma == null ? '0.00' : $query->row()->suma;

				//Pagos a proveedores				
				$this->db->select('sum(cuentacorrienteproveedor.cctepHaber) as suma', false);
				$this->db->from('cuentacorrienteproveedor');
				$this->db->where(array('cuentacorrienteproveedor.cajaId'=>$idBox));
				$query = $this->db->get();
				$data['box']['proveedor'] = $query->row()->suma == null ? '0.00' : $query->row()->suma;

				//Calcular Ventas
				$this->db->select('count(*) as suma', false);
				$this->db->from('ventas');
				$this->db->where(array('cajaId'=>$idBox, 'cliId != '=> null));
				$query = $this->db->get();
				$data['box']['ventas'] = $query->row()->suma == null ? '0' : $query->row()->suma;

				//Calcular Services
				$this->db->select('count(*) as suma', false);
				$this->db->from('ventas');
				$this->db->where(array('cajaId'=>$idBox, 'srvId != '=> null));
				$query = $this->db->get();
				$data['box']['servicios'] = $query->row()->suma == null ? '0' : $query->row()->suma;

			} else {
				$userdata = $this->session->userdata('user_data');

				$box = array();
				$box['cajaApertura'] = '';
				$box['cajaCierre'] = '';
				$box['cajaImpApertura'] = '';
				$box['cajaImpVentas'] = '0.00';
				$box['cajaImpRendicion'] = '0.00';
				$box['cajaRetiros'] = '0.00';

				$box['usrId'] = $userdata[0]['usrId'];
				$box['usrName'] = $userdata[0]['usrName'];
				$box['usrLastName'] = $userdata[0]['usrLastName'];

				$data['box'] = $box;
				$data['box']['medios'] = array();
				$data['box']['cliente'] = '0.00';
				$data['box']['proveedor'] = '0.00';
				$data['box']['ventas'] = 0;
				$data['box']['servicios'] = 0;
			}

			$data['action'] = $action;

			return $data;
		}
	}
	
	function setBox($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$id = $data['id'];
			$act = $data['act'];
			$ape = $data['ape'];
			$ven = $data['ven'];
			$cie = $data['cie'];

			switch($act){
				case 'Add':
					//Agregar caja
					$userdata = $this->session->userdata('user_data');

					$data = array(
					   'cajaApertura' 	=> date('Y-m-d H:i:s'),
					   'cajaCierre'		=> null,
					   'usrId'			=> $userdata[0]['usrId'],
					   'cajaImpApertura'=> $ape,
					   'cajaImpVentas'	=> null,
					   'cajaImpRendicion'=>null
					);

					if($this->db->insert('cajas', $data) == false) {
						return false;
					}
					break;

				case 'Close':
					//Cerrar caja
					$data = array(
					   'cajaCierre'		=> date('Y-m-d H:i:s'),
					   'cajaImpVentas'	=> $ven,
					   'cajaImpRendicion'=>$cie
					);
					if($this->db->update('cajas', $data, array('cajaId'=>$id)) == false) {
						return false;
					}
					break;
			}

			return true;

		}
	}

	function setRetiro($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$imp = $data['imp'];
			$des = $data['des'];

			$userdata = $this->session->userdata('user_data');
			
			$this->db->select('cajaId');
			$this->db->from('cajas');
			$this->db->where('cajaCierre', null);
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$c = $query->result_array();

				$data = array(
					   'usrId'			=> $userdata[0]['usrId'],
					   'retImporte'		=> $imp,
					   'retDescripcion'	=> $des,
					   'cajaId'			=> $c[0]['cajaId']
					);

				if($this->db->insert('retiros', $data) == false) {
						return false;
				}
			} else 
			{
				return false;
			}

			return true;
		}
	}
	
	function isOpenBox(){
		//verificar si hay cajas abiertas
		$this->db->where('cajaCierre', null);
		$this->db->from('cajas');
		return $this->db->count_all_results();
	}

	function getRetiros($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$idBox = $data['id'];
			$this->db->select('retiros.*, sisusers.usrNick');
			$this->db->from('retiros');
			$this->db->join('sisusers', 'sisusers.usrId = retiros.usrId');
			$this->db->where(array('retiros.cajaId'=>$idBox));
			$query= $this->db->get();
			return $query->result_array();
		}
	}

	function printBox($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$data['act'] = 'View';
			$result = $this->getBox($data);
			$importe = 0;

			$html = '<table width="100%" style="font-family: Impact, Charcoal, sans-serif; font-size: 15px;">';
			$html .= '	<tr>
							<td width="10%">
								<img src="./assets/images/logo.png">
							</td>
							<td style="text-align: center; font-family: Impact, Charcoal, sans-serif;" >
								<strong style="font-size: 60px; color: gray;">EL GALLO</strong> <br>
								<strong>SERVICIO INTEGRAL DEL AUTOMOTOR<br>
								<i>Paula Albarracín de Sarmiento N° 184<br>
								Tel.: 0264 - 4961850 Cel.: 0264 - 154045426<br>
								C.P. 5442 - Caucete San Juan </i>
							</td>
						</tr>';
			$html .= '	<tr><td colspan="2"><center><h1>Resumen Cierre de Caja '.str_pad($result['box']['cajaId'], 10, "0", STR_PAD_LEFT).'</h1></center></td></tr>';
			$dateA = date_create($result['box']['cajaApertura']);
			$dateC = date_create($result['box']['cajaCierre']);
			$html .= '	<tr>
							<td colspan="2">
								<table width="100%">
									<tr>
										<td width="33%">
											Apertura: <strong>'.date_format($dateA, 'd-m-Y H:i').'</strong>
										</td>
										<td width="33%">
											Cierre: <strong>'.date_format($dateC, 'd-m-Y H:i').'</strong>
										</td>
										<td width="33%">
											Usuario: <strong>'.$result['box']['usrName'].' '.$result['box']['usrLastName'].'</strong>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="2"><hr></td>
						</tr> ';
			$importe = $result['box']['cajaImpApertura'] + $result['box']['cajaImpVentas'] + $result['box']['cliente'] - $result['box']['proveedor'];
			$html .= '	<tr>
							<td colspan="2">
								<table width="100%">
									<tr>
										<td width="23%">
											Fondo Inicial (+): 
										</td>
										<td width="27%">
											<strong>$ '.$result['box']['cajaImpApertura'].'</strong>
										</td>
										<td width="15%">
											
										</td>
										<td width="35%">
											
										</td>
									</tr>
									<tr>
										<td width="23%">
											Importe Cobrado (+):
										</td>
										<td width="27%">
											<strong>$ '.$result['box']['cajaImpVentas'].'</strong>
										</td>
										<td width="15%" style="text-align: right:">
											Ventas: 
										</td>
										<td width="35%">
											'.$result['box']['ventas'].'
										</td>
									</tr>
									<tr>
										<td width="23%">
											Cta Cte Clientes (+): 
										</td>
										<td width="27%">
											<strong>$ '.$result['box']['cliente'].'</strong>
										</td>
										<td width="15%" style="text-align: right:">
											Servicios: 
										</td>
										<td width="35%">
											'.$result['box']['servicios'].'
										</td>
									</tr>
									<tr>
										<td width="23%">
											Pago Proveedores (-): 
										</td>
										<td width="27%">
											<strong>$ '.$result['box']['proveedor'].'</strong>
										</td>
										<td width="15%">
											
										</td>
										<td width="35%">
											
										</td>
									</tr>';
			$html .=			'	<tr>
										<td colspan="4">
										<hr>
										</td>
									</tr>';
									foreach ($result['box']['medios'] as $key => $item):
									if($item['medDescripcion'] != 'Efectivo'){
										$importe -= $item['importe'];
									}
								    $html .= '<tr>
												<td width="23%">
													'.$item['medDescripcion'].' '.($item['medDescripcion'] == 'Efectivo' ? '(*)': '(-)').': 
												</td>
												<td width="27%">
													<strong>$ '.$item['importe'].'</strong>
												</td>
												<td width="15%">
													
												</td>
												<td width="35%">
													'.($item['medDescripcion'] == 'Efectivo' ? '<i>(*) No Afecta el resultado </i>': '').'
												</td>
											</tr>';
								    endforeach;
			$html .=			'	<tr>
										<td colspan="4">
										<hr>
										</td>
									</tr>';
									$importe -= $result['box']['cajaRetiros'];
			$html .=			'	<tr>
										<td width="23%">
											Retiros (-): 
										</td>
										<td width="27%">
											<strong>$ '.$result['box']['cajaRetiros'].'</strong>
										</td>
										<td width="15%">
											
										</td>
										<td width="35%">
											
										</td>
									</tr>';
			$html .=			'	<tr>
										<td colspan="4">
										<hr>
										</td>
									</tr>
									<tr>
										<td width="23%">
											Total a Rendir: 
										</td>
										<td width="27%">
											<strong>$ '.number_format($importe, 2, '.', '').'</strong>
										</td>
										<td width="15%">
											Rendición: 
										</td>
										<td width="35%">
											<strong>$ '.$result['box']['cajaImpRendicion'].'</strong>
										</td>
									</tr>
									<tr>
										<td colspan="4">
										<hr>
										</td>
									</tr>';
			$html .=			'	<tr>
										<td colspan="4">';
									if(($importe - $result['box']['cajaImpRendicion']) > 0){
										//Faltante
										$html .= '<strong style="color: red"> Faltante: <h2>$ '.number_format($importe - $result['box']['cajaImpRendicion'], 2, '.', '').'</h2></strong>';
									} else {
										//Sobrante 
										$html .= '<strong style="color: green"> Sobrante: <h2>$ '.number_format(abs($importe - $result['box']['cajaImpRendicion']), 2, '.', '').'</h2></strong>';
									}
			$html .= 			'		</td>
									</tr>';						
			$html .= 				'<tr>
										<td colspan="4">
										<hr>
										</td>
									</tr>
								</table>
							</td>
					  	</tr>';
			$html .= '</table>';

			//se incluye la libreria de dompdf
			require_once("assets/plugin/HTMLtoPDF/dompdf/dompdf_config.inc.php");
			//se crea una nueva instancia al DOMPDF
			$dompdf = new DOMPDF();
			//se carga el codigo html
			$dompdf->load_html(utf8_decode($html));
			//aumentamos memoria del servidor si es necesario
			ini_set("memory_limit","300M");
			//Tamaño de la página y orientación
			$dompdf->set_paper('a4','portrait');
			//lanzamos a render
			$dompdf->render();
			//guardamos a PDF
			//$dompdf->stream("TrabajosPedndientes.pdf");
			$output = $dompdf->output();
			file_put_contents('assets/boxs/'.$data['id'].'.pdf', $output);

			//Eliminar archivos viejos ---------------
			$dir = opendir('assets/boxs/');
			while($f = readdir($dir))
			{
				if((time()-filemtime('assets/boxs/'.$f) > 3600*24*1) and !(is_dir('assets/boxs/'.$f)))
				unlink('assets/boxs/'.$f);
			}
			closedir($dir);
			//----------------------------------------
			return $data['id'].'.pdf';
		}
	}
}
?>