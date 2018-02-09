<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuentacorrientes extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function getCtaCteP($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$prvId = $data['prvId'];
			$result= array();

			$this->db->select('cuentacorrienteproveedor.*, sisusers.usrNick');
			$this->db->from('cuentacorrienteproveedor');
			$this->db->join('sisusers', 'sisusers.usrId = cuentacorrienteproveedor.usrId');
			$this->db->where(array('prvId' => $prvId));
			$this->db->order_by('cuentacorrienteproveedor.cctepfecha', 'desc');
			$query = $this->db->get();

			$result['data'] = $query->result_array();	

			return $result;
		}
	}

	function setCtaCteP($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$prvId 	= $data['prvId'];
            $cpto 	= $data['cpto'];
			$impte 	= $data['impte'];

			$userdata = $this->session->userdata('user_data');

			$ctacte = array(
					'cctepConcepto'		=>	$cpto,
					'cctepTipo'			=>	'MN',
					'cctepDebe'			=>	$impte < 0 ? $impte * -1 : 0,
					'cctepHaber'		=>	$impte > 0 ? $impte : 0,
					'cctepFecha'		=> 	date("Y-m-d H:i:s"),
					'prvId'				=> 	$prvId,
					'usrId'				=>	$userdata[0]['usrId']
				);

			if($this->db->insert('cuentacorrienteproveedor', $ctacte) == false) {
				return false;
			}

			return true;
		}
	}

	//Clientes
	function getCtaCteC($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$cliId = $data['cliId'];
			$result= array();

			$this->db->select('cuentacorrientecliente.*, sisusers.usrNick');
			$this->db->from('cuentacorrientecliente');
			$this->db->join('sisusers', 'sisusers.usrId = cuentacorrientecliente.usrId');
			$this->db->where(array('cliId' => $cliId));
			$this->db->order_by('cuentacorrientecliente.cctepfecha', 'desc');
			$query = $this->db->get();

			$result['data'] = $query->result_array();	

			return $result;
		}
	}

	function setCtaCteC($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$cliId 	= $data['cliId'];
            $cpto 	= $data['cpto'];
			$impte 	= $data['impte'];

			$userdata = $this->session->userdata('user_data');

			$ctacte = array(
					'cctepConcepto'		=>	$cpto,
					'cctepTipo'			=>	'MN',
					'cctepDebe'			=>	$impte < 0 ? $impte * -1 : 0,
					'cctepHaber'		=>	$impte > 0 ? $impte : 0,
					'cliId'				=> 	$cliId,
					'usrId'				=>	$userdata[0]['usrId']
				);

			if($this->db->insert('cuentacorrientecliente', $ctacte) == false) {
				return false;
			}

			return true;
		}
	}
}
?>