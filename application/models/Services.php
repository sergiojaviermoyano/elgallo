<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Services extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function setService($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$vehId = $data['vehId'];
			$cliId = $data['cliId'];
			$kmSrv = $data['kmSrv'];
			$proxS = $data['proxS'];
			$comen = $data['comen'];
			$detal = $data['detal'];
			$tickt = $data['tickt'];
			$userdata = $this->session->userdata('user_data');

			$data = array(
				   'vehId' 			=> $vehId,
				   'srvKm'			=> $kmSrv,
				   'srvObservacion'	=> $comen,
				   'usrId'			=> $userdata[0]['usrId'],
				   'cliId'			=> $cliId,
				   'srvKmProxService' => $proxS
				);

			//Agregar Servicio
			$this->db->trans_start();
				if($this->db->insert('services', $data) == false) {
					return false;
				}

				$idSrv = $this->db->insert_id();

				if($this->db->update('vehiculos', array('cliId' => $cliId), array('vehId'=>$vehId)) == false) {
				 		return false;
				 	}

				foreach ($detal as $item) {
					$detail = array(
						'srvId'				=> $idSrv,
						'artId'				=> $item['artId'] == -1 ? null : $item['artId'],
						'srvdCant' 			=> $item['srvdCant'],
						'artDescripcion'	=> $item['artDescripcion'],
						'artCosto'			=> $item['artCosto'],
						'artVenta'			=> $item['artventa']
						);
					if($this->db->insert('servicedetalle', $detail) == false) {
						return false;
					}

					//
					if($item['artId'] > -1){
						//Evaluar si el producto es simple o cumpuesto
						$query = $this->db->get_where('articulosdetalle', array('artId' => $item['artId']));
						$result = $query->result_array();
						if(count($result) > 0){
							//Producto Compuesto
							foreach ($result as $item_) {
								$insert = array(
									'artId' 		=> $item_['artId_'],
									'stkCant'		=> $item_['artDetCantidad'] * -1 * $item['srvdCant'],
									'stkOrigen'		=> 'SV',
									'recId'			=> $idSrv
								);

								if($this->db->insert('stock', $insert) == false) {
									return false;
								}
								
							}

						} 

						$insert = array(
								'artId' 		=> $item['artId'],
								'stkCant'		=> ($item['srvdCant'] * -1),
								'stkOrigen'		=> 'SV',
								'recId'			=> $idSrv
							);

							if($this->db->insert('stock', $insert) == false) {
								return false;
							}
					}
					//

				}

				//ticket
				$ticket = array(
						'srvId'			=> $idSrv,
						'lavado'		=> ($tickt['lavado'] === 'true'),
						'lavadoMotor'	=> ($tickt['lavadoMotor'] === 'true'),
						'lavadoConMotor'=> ($tickt['lavadoCmotor'] === 'true'),
						'pulido'		=> ($tickt['pulido'] === 'true'),
						'acMotor'       => ($tickt['acMotor'] === 'true'),
			            'acNombre'      => $tickt['acNombre'],
			            'acLitros'      => $tickt['acLitros'],
			            'fAire'         => ($tickt['fAire'] === 'true'),
			            'fAceite'       => ($tickt['fAceite'] === 'true'),
			            'fCombustible'  => ($tickt['fCombustible'] === 'true'),
			            'fHabitaculo'   => ($tickt['fHabitaculo'] === 'true'),
			            'agAgua'        => ($tickt['agAgua'] === 'true'),
			            'cAgua'         => ($tickt['cAgua'] === 'true'),
			            'aLiquiFre'     => ($tickt['aLiquiFre'] === 'true'),
			            'aditivoAceite' => ($tickt['aditivoAceite'] === 'true'),
			            'aHidraulico'   => ($tickt['aHidraulico'] === 'true'),
			            'aLiquidoParabrisa'  => ($tickt['aLiquidoParabrisa'] === 'true'),
			            'cAceiteHidraulico'  => ($tickt['cAceiteHidraulico'] === 'true'),
			            'aTransCaja'         => ($tickt['aTransCaja'] === 'true'),
			            'aTransCajaLitros'   => $tickt['aTransCajaLitros'],
			            'aDifer'             => ($tickt['aDifer'] === 'true'),
			            'aDiferLitros'       => $tickt['aDiferLitros'],
			            'otros'			=> $tickt['otros']
					);

				if($this->db->insert('serviceticket', $ticket) == false) {
						return false;
					}

			$this->db->trans_complete();
			return true;

		}
	}

	function getServices($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$idVehicle = $data['id'];
			$this->db->select('srvId, srvFecha, srvKm, srvEstado');
			$this->db->from('services');
			$this->db->where(array('vehId' => $idVehicle));
			$this->db->order_by('srvFecha', 'desc');
			$query = $this->db->get();

			return $query->result_array();
		}
	}

	function getServiceId($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$idService = $data['id'];
			$data= array();
			//Servicio
			$query = $this->db->get_where('services', array('srvId' => $idService));
			$serv = $query->result_array();
			$data['servicio'] = $serv[0];

			//Auto y CLiente
			$this->db->select('
							vehiculos.*,
							marcaveh.marDescripcion,
							tipo_vehiculo.tpvDescripcion'
							);
			$this->db->from('vehiculos');
			$this->db->join('marcaveh', 'marcaveh.marId = vehiculos.marId');
			$this->db->join('tipo_vehiculo', 'tipo_vehiculo.tpvId = vehiculos.tpvId');
			$this->db->where(array('vehiculos.vehId'=>$serv[0]['vehId']));
			$query= $this->db->get();
			$car = $query->result_array();
			$data['vehiculo'] = $car[0];

			$this->db->select('clientes.cliNombre, clientes.cliApellido, clientes.cliTelefono, clientes.cliDocumento, clientes.cliId');
			$this->db->from('clientes');
			$this->db->where(array('cliId' => $serv[0]['cliId']));
			$query = $this->db->get();
			$cli = $query->result_array();
			$data['vehiculo']['cliente'] = $cli[0];

			//Detalle
			$this->db->select('
							servicedetalle.*,
							articles.artBarCode, articles.artProvCode'
							);
			$this->db->from('servicedetalle');
			$this->db->join('articles', 'articles.artId = servicedetalle.artId', 'left outer');
			$this->db->where(array('srvId' => $idService));
			$query = $this->db->get();
			$data['servicio']['detalle'] = $query->result_array();

			//Ticket
			$query = $this->db->get_where('serviceticket', array('srvId' => $idService));
			$data['servicio']['ticket'] = $query->result_array();

			return $data;
		}
	}

	function getLast10Services(){
		$this->db->select('srvId, srvFecha, srvKm, srvEstado, vehiculos.*, marcaveh.marDescripcion');
		$this->db->from('services');
		$this->db->join('vehiculos', 'vehiculos.vehId = services.vehId');
		$this->db->join('marcaveh', 'marcaveh.marId = vehiculos.marId');
		$this->db->order_by('srvFecha', 'desc');
		$this->db->limit(10);
		$query = $this->db->get();

		return $query->result_array();
	}

	function printTicket($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$result = $this->getServiceId($data);

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
			$html .= '	<tr><td colspan="2">';
			$html .= '		<table width="100%">
								<tr><td>Sr.:</td><td colspan="3"><strong>'.$result['vehiculo']['cliente']['cliNombre'].' '.$result['vehiculo']['cliente']['cliApellido'].'</strong></td></tr>
								<tr><td>Vehículo/Modelo</td><td colspan="3"><strong>'.$result['vehiculo']['marDescripcion'].' '.$result['vehiculo']['vehModelo'].'<strong></strong></td></tr>
								<tr><td>Patente</td><td colspan="3"><strong>'.$result['vehiculo']['vehPatente'].'</strong></td></tr>
								<tr><td>N° Móvil:</td>
									<td><strong>'.$result['vehiculo']['cliente']['cliTelefono'].'</strong></td>
									<td>KILOMETROS: <strong>'.number_format($result['servicio']['srvKm'], 0, ",", ".").'</strong></td>
									<td>PROX: <strong>'.number_format($result['servicio']['srvKmProxService'], 0, ",", ".").'</strong></td>
								</tr>
							</table>';
			$html .= '	</td></tr>';
			$html .= '	<tr><td colspan="2" style="text-align: center; font-size: 20px;"><u>DESCRIPCIÓN</u></td></tr>';
			$ticket = $result['servicio']['ticket'][0];
			//Lavadero
			$html .= '	<tr><td colspan="2" style="text-align: center; font-size: 15px;"><u>LAVADERO</u></td></tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Lavado</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['lavado'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Lavado con Motor</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['lavadoConMotor'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Lavado Motor</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['lavadoMotor'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Pulido</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['pulido'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';

			//Lubricentro
			$html .= '	<tr><td colspan="2" style="text-align: center; font-size: 15px;"><u>LUBRICENTRO</u></td></tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Aceite/Motor</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['acMotor'] == 1 ? '<img height="15px" src="./assets/images/check.png">  '.$ticket['acNombre'].',  '.$ticket['acLitros'].' litros' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Filtro/Aire</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['fAire'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Filtro/Aceite</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['fAceite'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Filtro/Combustible</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['fCombustible'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Filtro/Habitáculo</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['fHabitaculo'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Agregado de Agua</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['agAgua'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Cambio/Agua y Aditivo</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['cAgua'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Agregado/Liquido de Freno</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['aLiquiFre'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Aditivo de Aceite</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['aditivoAceite'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Agregado/Aceite Hidráulico</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['aHidraulico'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Agregado/Liquido Limpia Parabrisas</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['aLiquidoParabrisa'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Cambio/Aceite Hidráulico</td>
							<td style="border-bottom: 1px solid #ccc;">'.($ticket['cAceiteHidraulico'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Aceite/Transmisión</td>
							<td>
								<table width="100%">
									<tr>
										<td style="border-bottom: 1px solid #ccc;">Caja</td>
										<td style="border-bottom: 1px solid #ccc;">'.($ticket['aTransCaja'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
										<td style="border-bottom: 1px solid #ccc;">Diferencial</td>
										<td style="border-bottom: 1px solid #ccc;">'.($ticket['aDifer'] == 1 ? '<img height="15px" src="./assets/images/check.png">' : '').'</td>
									</tr>
									<tr>
										<td style="border-bottom: 1px solid #ccc;">Litros</td>
										<td style="border-bottom: 1px solid #ccc;">'.$ticket['aTransCajaLitros'].'</td>
										<td style="border-bottom: 1px solid #ccc;">Litros</td>
										<td style="border-bottom: 1px solid #ccc;">'.$ticket['aDiferLitros'].'</td>
									</tr>
								</table>
							</td>
						</tr>';

			//Mecanica
			$html .= '	<tr><td colspan="2" style="text-align: center; font-size: 15px;"><u>MECANICA</u></td></tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Mecánica Ligera</td>
							<td style="border-bottom: 1px solid #ccc;">'.$result['servicio']['srvObservacion'].'</td>
						</tr>';
			$html .= '	<tr>
							<td style="border-bottom: 1px solid #ccc;">Otros</td>
							<td style="border-bottom: 1px solid #ccc;">'.$ticket['otros'].'</td>
						</tr>';


			$html .= '	<tr><td colspan="2" style="text-align: center; font-size: 8px;"><br><br>DOCUMENTO NO VALIDO COMO FACTURA</td></tr>';

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
			file_put_contents('assets/tickets/'.$data['id'].'.pdf', $output);

			//Eliminar archivos viejos ---------------
			$dir = opendir('assets/tickets/');
			while($f = readdir($dir))
			{
				if((time()-filemtime('assets/tickets/'.$f) > 3600*24*1) and !(is_dir('assets/tickets/'.$f)))
				unlink('assets/tickets/'.$f);
			}
			closedir($dir);
			//----------------------------------------
			return $data['id'].'.pdf';
		}
	}

	function getList(){
		$this->db->select('srvId, srvFecha, srvKm, srvEstado, vehiculos.*, marcaveh.marDescripcion');
		$this->db->from('services');
		$this->db->join('vehiculos', 'vehiculos.vehId = services.vehId');
		$this->db->join('marcaveh', 'marcaveh.marId = vehiculos.marId');
		$this->db->order_by('srvFecha', 'desc');
		$query = $this->db->get();

		return $query->result_array();
	}
}
