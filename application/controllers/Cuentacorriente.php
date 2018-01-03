<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cuentacorriente extends CI_Controller {

	function __construct() 
        {
		parent::__construct();
		$this->load->model('Cuentacorrientes');
		$this->load->model('Providers');
		$this->Users->updateSession(true);
	}

	public function indexp($permission)
	{
		$data['list'] = $this->Providers->Providers_List();
		$data['permission'] = $permission;
		echo json_encode($this->load->view('cuentacorrientes/listp', $data, true));
	}

	public function getCtaCteP(){
		$data['data'] = $this->Cuentacorrientes->getCtaCteP($this->input->post());
		$response['html'] = $this->load->view('cuentacorrientes/viewp', $data, true);

		echo json_encode($response);
	}

	public function setCtaCteP(){
		$data = $this->Cuentacorrientes->setCtaCteP($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}
}