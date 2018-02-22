<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sale extends CI_Controller {

	function __construct()
        {
		parent::__construct();
		$this->load->model('Sales');
		$this->load->model('Services');
		$this->load->model('Lists');
		$this->load->model('Customers');
		$this->Users->updateSession(true);
	}

	public function cobrar($srvId)
	{
		$data['service'] = $this->Services->getServiceId(array('id' => $srvId));
		$data['lists'] = $this->Lists->List_List();
		echo json_encode($this->load->view('sales/cobrar', $data, true));
	}

	public function getMPagos(){
		$data['data'] = $this->Sales->getMPagos($this->input->post());
		$response['html'] = $this->load->view('sales/medios', $data, true);

		echo json_encode($response);
	}

	public function setSale(){
		$data = $this->Sales->setSale($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}

	public function setSaleEfectivo(){
		$data = $this->Sales->setSaleEfectivo($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}

	public function add()
	{
		$data['customers'] = $this->Customers->Customers_List_Single();
		$data['lists'] = $this->Lists->List_List();
		echo json_encode($this->load->view('sales/add', $data, true));
	}
	/*
	public function index($permission)
	{
		$data['list'] = $this->Sales->Sale_List();
		$data['permission'] = $permission;
		echo json_encode($this->load->view('sales/list', $data, true));
	}
		
	public function getSale(){
		$data['data'] = $this->Sales->getSale($this->input->post());
		$response['html'] = $this->load->view('sales/detail_', $data, true);

		echo json_encode($response);
	}

	public function setSale(){
		$data = $this->Sales->setSale($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}

	public function delSale(){
		$data = $this->Sales->delSale($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}

	public function printSale(){
		//var_dump($this->Sales->printSale($this->input->post()));
		echo json_encode($this->Sales->printSale($this->input->post()));
	}
	*/	
}