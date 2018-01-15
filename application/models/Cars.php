<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cars extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function findCar($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$patente = strtoupper(str_replace(' ', '', $data['patente']));

			$this->db->select('
							vehiculos.*, 
							marcaveh.marDescripcion, 
							tipo_vehiculo.tpvDescripcion,
							(select count(*) from services where vehId = vehiculos.vehId) as servicesCount'
							);
			$this->db->from('vehiculos');
			$this->db->join('marcaveh', 'marcaveh.marId = vehiculos.marId');
			$this->db->join('tipo_vehiculo', 'tipo_vehiculo.tpvId = vehiculos.tpvId');
			$this->db->where(array('vehiculos.vehPatente'=>$patente));
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$c = $query->result_array();

				$data['vehiculo'] = $c[0];
				if($c[0]['cliId'] != null){
					//buscar cliente
					$this->db->select('clientes.cliNombre, clientes.cliApellido, clientes.cliTelefono, clientes.cliDocumento, clientes.cliId');
					$this->db->from('clientes');
					$this->db->where(array('cliId' => $c[0]['cliId']));
					$query = $this->db->get();
					if ($query->num_rows() != 0)
					{
						$c = $query->result_array();
						$data['vehiculo']['cliente'] = $c[0];
					} else {
						$data['vehiculo']['cliente'] = false;
					}
				}
				return $data;
			} else {
				return false;
			}
		}
	}	

	function findCarArticles($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$id = $data['id'];
			$data = array();

			$this->db->select('
								vehiculo_articulo.vehartCant, 
								articles.artId, articles.artDescription, articles.artBarCode, articles.artCoste, 
								Case
									When articles.artMarginIsPorcent = 1 then (articles.artCoste * (1 + (articles.artMargin / 100)))
									When articles.artMarginIsPorcent = 0 then (articles.artCoste + articles.artMargin)
								End as precio
							');
			$this->db->from('vehiculo_articulo');
			$this->db->join('articles', 'articles.artId = vehiculo_articulo.artId');
			$this->db->where(array('vehiculo_articulo.vehId' => $id));
			$query= $this->db->get();
			//echo $this->db->last_query();
			$data['articles'] =  $query->result_array();
			return $data;
		}
	}

	function setCar($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$patente 	= strtoupper(str_replace(' ', '',$data['patente']));  
			$marca 		= $data['marca'];
            $modelo 	= $data['modelo'];
            $tipo 		= $data['tipo'];

            $data = array(
            		'vehPatente'	=> $patente,
            		'marId'			=> $marca,
            		'vehModelo'		=> $modelo,
            		'tpvId'			=> $tipo,
            		'vehEstado'		=> 'AC'
            	);

            if($this->db->insert('vehiculos', $data) == false) {
				return false;
			} 

			return true;
		}
	}

	function asociateArticleCar($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
            $vehId	 	= $data['carId'];
            $artId 		= $data['artId'];
            $cant 		= $data['cant'];

            $data = array(
            		'vehId'			=> $vehId,
            		'artId'			=> $artId,
            		'vehartCant'	=> $cant
            	);

            if($this->db->insert('vehiculo_articulo', $data) == false) {
				return false;
			} 

			return true;
		}
	}

	function removeRelationalArticle($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
            $vehId	 	= $data['vehId'];
            $artId 		= $data['artId'];

            $data = array(
            		'vehId'			=> $vehId,
            		'artId'			=> $artId
            	);

            if($this->db->delete('vehiculo_articulo', $data) == false) {
		 		return false;
		 	}

			return true;
		}
	}
}