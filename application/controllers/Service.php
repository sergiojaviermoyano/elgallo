<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {
	function __construct()
        {
		parent::__construct();
		$this->load->model('Brands');
		$this->load->model('Types');
		$this->load->model('Services');
		$this->Users->updateSession(true);
	}

	public function crear(){
		$data['crud'] = array();
		$data['crud']['brand'] = $this->Brands->BrandVeh_list(); 
		$data['crud']['types'] = $this->Types->VehiclesType_list();
		echo json_encode($this->load->view('services/create', $data, true));
	}

	public function setService(){
		$data = $this->Services->setService($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	} 

	public function getServices(){
		$data['data'] = $this->Services->getServices($this->input->post());
		$response['html'] = $this->load->view('services/history', $data, true);
		echo json_encode($response);
	}

	public function getServiceId(){
		$data['data'] = $this->Services->getServiceId($this->input->post());
		$response['html'] = $this->load->view('services/service', $data, true);
		echo json_encode($response);
	}

	public function printTicket(){
		echo json_encode($this->Services->printTicket($this->input->post()));
	}

	public function index($permission){
		$data['services'] = $this->Services->getList();
		echo json_encode($this->load->view('services/list', $data, true));
	}

	public function getTicket(){
		$data['data'] = $this->Services->getServiceId($this->input->get());
		$response['html'] = $this->load->view('services/ticket', $data, true);
		echo json_encode($response);
	}

	public function editTicket(){
		$data = $this->Services->editTicket($this->input->post());
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
