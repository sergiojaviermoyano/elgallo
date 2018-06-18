<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class car extends CI_Controller {

	function __construct()
        {
		parent::__construct();
		$this->load->model('Cars');
		$this->load->model('Brands');
		$this->load->model('Types');
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

	public function findCarArticlesView(){
		$data['data'] = $this->Cars->findCarArticles($this->input->post());
		$response['html'] = $this->load->view('cars/vehicle_articles_view', $data, true);
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

	public function index($permission)
	{
		$data['list'] = $this->Cars->Car_list();
		$data['permission'] = $permission;
		echo json_encode($this->load->view('cars/list', $data, true));
	}

	public function getCar(){
		$data['data'] = array();
		$data['data']['car'] = $this->Cars->getCar($this->input->post());
		$data['data']['brand'] = $this->Brands->BrandVeh_list(); 
		$data['data']['types'] = $this->Types->VehiclesType_list();
		$response['html'] = $this->load->view('cars/view_', $data, true);
		echo json_encode($response);
	}

	public function updateCar(){
		$data = $this->Cars->updateCar($this->input->post());
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