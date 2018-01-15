<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class car extends CI_Controller {

	function __construct()
        {
		parent::__construct();
		$this->load->model('Cars');
		$this->Users->updateSession(true);
	}

	public function findCar(){
		$data = $this->Cars->findCar($this->input->post());
		echo json_encode($data);
	}

	public function findCarArticles(){
		$data['data'] = $this->Cars->findCarArticles($this->input->post());
		$response['html'] = $this->load->view('cars/vehicle_articles', $data, true);
		echo json_encode($response);
	}

	public function setCar(){
		$data = $this->Cars->setCar($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}

	public function asociateArticleCar(){
		$data = $this->Cars->asociateArticleCar($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}	
	}

	public function removeRelationalArticle(){
		$data = $this->Cars->removeRelationalArticle($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);	
		}
	}
	/*
	public function index($permission)
	{
		$data['list'] = $this->Boxs->Box_List();
		$data['permission'] = $permission;
		echo json_encode($this->load->view('boxs/list', $data, true));
	}

	public function pagination()
	{
		echo json_encode($this->Boxs->Box_List($this->input->post()));
	}
	
	
	public function getBox(){
		$data['data'] = $this->Boxs->getBox($this->input->post());
		$response['html'] = $this->load->view('boxs/view_', $data, true);
		echo json_encode($response);
	}

	*/
	
}