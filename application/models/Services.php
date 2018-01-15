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
			$comen = $data['comen'];
			$detal = $data['detal'];
			$userdata = $this->session->userdata('user_data'); 

			$data = array(
				   'vehId' 			=> $vehId,
				   'srvKm'			=> $kmSrv,
				   'srvObservacion'	=> $comen,
				   'usrId'			=> $userdata[0]['usrId'],
				   'cliId'			=> $cliId
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
			$query = $this->db->get_where('servicedetalle', array('srvId' => $idService));
			$data['servicio']['detalle'] = $query->result_array();

			return $data;
			

		}
	}
}