<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class article extends CI_Controller {

	function __construct()
        {
		parent::__construct();
		$this->load->model('Articles');
		$this->Users->updateSession(true);
	}

	public function index($permission)
	{
		$data['list'] = $this->Articles->Articles_List();
		$data['permission'] = $permission;
		echo json_encode($this->load->view('articles/list', $data, true));
	}

	public function faltante($permission)
	{
		$data['list'] = $this->Articles->Articles_List_Stock();
		$data['permission'] = $permission;
		echo json_encode($this->load->view('articles/listf', $data, true));
	}


	public function getArticle(){
		$data['data'] = $this->Articles->getArticle($this->input->post());
		$response['html'] = $this->load->view('articles/view_', $data, true);

		echo json_encode($response);
	}

	public function getArticleJson(){
		echo json_encode($this->Articles->getArticleJson($this->input->post()));
	}

	public function setArticle(){
		$data = $this->Articles->setArticle($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);
		}
	}

	public function buscadorArticlesSingles() {
		$data = $this->Articles->buscadorArticlesSingles($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode($data);
		}
	}

	public function buscadorArticlesNoPrice() {
		$data = $this->Articles->buscadorArticlesNoPrice($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode($data);
		}
	}

	public function buscadorArticlesPrice() {
		$data = $this->Articles->buscadorArticlesPrice($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode($data);
		}
	}

	public function searchByCode() {
		$data = $this->Articles->searchByCode($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode($data);
		}
	}

	public function searchByAll() {
		$data = $this->Articles->searchByAll($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode($data);
		}
	}

	public function update_prices_by_rubro(){
		$data=$this->Articles->update_prices_by_rubro($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode(true);
		}
	}

	public function get_for_update_prices_by_rubro(){
		$data=$this->Articles->get_for_update_prices($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode($data);
		}
	}

	public function get_for_update_prices_by_file(){
		$data=$this->Articles->get_for_update_prices_by_file($this->input->post());
		if($data  == false)
		{
			echo json_encode(false);
		}
		else
		{
			echo json_encode($data);
		}
	}

}
