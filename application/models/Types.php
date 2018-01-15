<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Types extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function VehiclesType_list(){
		$this->db->order_by('tpvDescripcion', 'asc');
		$query= $this->db->get_where('tipo_vehiculo',array('tpvEstado' => 'AC'));
		return $query->result_array();
	}	
}