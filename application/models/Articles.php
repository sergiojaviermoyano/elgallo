<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Articles extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function Articles_List(){

		$query= $this->db->get('articles');

		if ($query->num_rows()!=0)
		{
			return $query->result_array();
		}
		else
		{
			return array();
		}
	}

	function getArticleJson($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$idArt = $data['id'];

			$data = array();
			$query= $this->db->get_where('articles',array('artId'=>$idArt));
			if ($query->num_rows() != 0)
			{
				$c = $query->result_array();
				$data['article'] = $c[0];
			}
			return $data;
		}
	}


	function getArticle($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$action = $data['act'];
			$idArt = $data['id'];

			$data = array();

			//Datos del articulo
			$query= $this->db->get_where('articles',array('artId'=>$idArt));
			if ($query->num_rows() != 0)
			{
				$c = $query->result_array();
				$data['article'] = $c[0];

			} else {
				$art = array();

				$art['artId'] = '';
				$art['artBarCode'] = '';
				$art['artEsSimple'] = '';
				$art['artProvCode'] = '';
				$art['artDescription'] = '';
				$art['artCoste'] = '';
				$art['artEsSimple'] = 1;
				$art['artMargin'] = '';
				$art['artMarginIsPorcent'] = '';
				$art['artIsByBox'] = '';
				$art['artCantBox'] = '';
				$art['artEstado'] = 'AC';
				$art['artMaximo'] = '';
				$art['artMedio'] = '';
				$art['artMinimo'] = '';

				$data['article'] = $art;
			}

			//Articulos extras
			$data['article']['detail'] = array();
			$this->db->select('articulosdetalle.artId_, articles.artDescription, articulosdetalle.artDetCantidad, articles.artBarCode');
			$this->db->from('articulosdetalle');
			$this->db->join('articles', 'articles.artId = articulosdetalle.artId_');
			$this->db->where(array('articulosdetalle.artId' => $data['article']['artId']));
			$query = $this->db->get();
			if ($query->num_rows()!=0)
			{
				$data['article']['detail'] = $query->result_array();
			}

			//Acción
			$data['article']['action'] = $action;

			//Readonly
			$readonly = false;
			if($action == 'Del' || $action == 'View'){
				$readonly = true;
			}

			//Subrubros
			$this->db->select('rubros.rubDescripcion, subrubros.subrDescripcion, subrId');
			$this->db->from('subrubros');
			$this->db->join('rubros', 'rubros.rubId = subrubros.rubId');
			$this->db->order_by('rubros.rubDescripcion', 'asc');
			$this->db->order_by('subrubros.subrDescripcion', 'asc');
			$this->db->where(array('rubros.rubEstado' => 'AC', 'subrubros.subrEstado' => 'AC'));
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$data['subrubros'] = $query->result_array();
			}

			//Marcas
			$this->db->select('');
			$this->db->from('marcaart');
			$this->db->order_by('descripcion', 'asc');
			$query= $this->db->get();
			if ($query->num_rows() != 0)
			{
				$data['marcas'] = $query->result_array();
			}

			$data['read'] = $readonly;
			$data['action'] = $action;

			return $data;
		}
	}

	function setArticle($data = null){
		if($data == null)
		{
			return false;
		}
		else
		{
			$id 	= $data['id'];
            $act 	= $data['act'];
            $name 	= $data['name'];
            $price 	= $data['price'];
            $margin = $data['marg'];
            $marginP = $data['margP'];
            $status = $data['status'];
            $code 	=	$data['code'];
            $pcode 	=	$data['pcode'];
            $marcId	=	$data['marcId'];
            $subrId	=	$data['subr'];
            $max 	= $data['max'];
            $med 	= $data['med'];
            $min 	= $data['min'];
            $arttipo = $data['arttipe'];
            $det 	= (isset($data['det']) ? $data['det'] : array());


			$data = array(
				   'artBarCode'						=> $code,
				   'artDescription' 				=> $name,
				   'artCoste'						=> $price,
				   'artMargin' 						=> $margin,
				   'artMarginIsPorcent' 			=> ($marginP === 'true'),
				   'artEstado' 						=> $status,
				   'marcId'							=> $marcId,
				   'subrId'							=> $subrId,
				   'artEsSimple'					=> $arttipo == 'S' ? 1 : 0,
				   'artEsPrecioVariable'			=> 0,
				   'artProvCode'					=> $pcode,
				   'artMinimo'						=> $min,
				   'artMedio'						=> $med,
				   'artMaximo'						=> $max
				);

			switch($act){
				case 'Add':
					//Agregar Artículo
					$this->db->trans_start();
					if($this->db->insert('articles', $data) == false) {
						return false;
					} else {
						$id = $this->db->insert_id();

						foreach ($det as $item) {
							$detail = array(
								'artId'				=> $id,
								'artId_'			=> $item[0],
								'artDetCantidad' 	=> $item[1]
								);
							if($this->db->insert('articulosdetalle', $detail) == false) {
								return false;
							}
						}
					}
					$this->db->trans_complete();
					break;

				 case 'Edit':
				 	//Actualizar Artículo
				 	$this->db->trans_start();
				 	if($this->db->update('articles', $data, array('artId'=>$id)) == false) {
				 		return false;
				 	} else {
				 		if($this->db->delete('articulosdetalle', array('artId'=>$id)) == false) {
					 		return false;
					 	} else {
					 		foreach ($det as $item) {
								$detail = array(
									'artId'				=> $id,
									'artId_'			=> $item[0],
									'artDetCantidad' 	=> $item[1]
									);
								if($this->db->insert('articulosdetalle', $detail) == false) {
									return false;
								}
							}
						}
				 	}
				 	$this->db->trans_complete();
				 	break;

				 case 'Del':
				 	//Eliminar Artículo
				 	$this->db->trans_start();
				 	if($this->db->delete('articulosdetalle', array('artId'=>$id)) == false) {
				 		return false;
				 	} else {
					 	if($this->db->delete('articles', array('artId'=>$id)) == false) {
					 		return false;
					 	}
					 }
				 	$this->db->trans_complete();
				 	break;

			}
			return true;

		}
	}

	function buscadorArticlesSingles($data = null){
		$str = '';
		if($data != null){
			$str = $data['str'];
		}

		$articles = array();

		$this->db->select('artId, artDescription, artBarcode');
		$this->db->from('articles');
		$this->db->like('artDescription', $str, 'both');
		$this->db->where(array('artEsSimple' => 1, 'artEstado'=>'AC'));
		$query = $this->db->get();
		if ($query->num_rows()!=0)
		{
			$articles = $query->result_array();
			return $articles;
		}

		return array();
	}

	function buscadorArticlesNoPrice($data = null){
		$str = '';
		if($data != null){
			$str = $data['str'];
		}

		$articles = array();

		$this->db->select('artId, artDescription, artBarcode');
		$this->db->from('articles');
		$this->db->like('artDescription', $str, 'both');
		$this->db->or_like('artBarCode', $str, 'both');
		$this->db->or_like('artProvCode', $str, 'both');
		$this->db->where(array('artEstado'=>'AC'));
		$query = $this->db->get();
		if ($query->num_rows()!=0)
		{
			$articles = $query->result_array();
			return $articles;
		}

		return array();
	}

	function buscadorArticlesPrice($data = null){
		$str = '';
		if($data != null){
			$str = $data['str'];
		}

		$articles = array();

		$this->db->select('artId, artDescription, artBarcode, artCoste, artMargin, artMarginIsPorcent');
		$this->db->from('articles');
		$this->db->like('artDescription', $str, 'both');
		$this->db->or_like('artBarCode', $str, 'both');
		$this->db->or_like('artProvCode', $str, 'both');
		$this->db->where(array('artEstado'=>'AC'));
		$query = $this->db->get();
		if ($query->num_rows()!=0)
		{
			$articles = $query->result_array();
			return $articles;
		}

		return array();
	}

	function searchByAll($data = null){
		$str = '';
		if($data != null){
			$str = $data['code'];
		}

		$art = array();

		$this->db->select('*');
		$this->db->from('articles');
		$this->db->where('artEstado','AC');
		$this->db->order_by('artDescription', 'asc');
		if($str != ''){
			$this->db->like('artBarCode',$str);
			$this->db->or_like('artDescription',$str);
		}
		$query = $this->db->get();
		if ($query->num_rows()!=0)
		{
			foreach($query->result_array() as $a){
				$articles = $a;

				//Calcular precios
				$pUnit = $articles['artCoste'];

				if($articles['artMarginIsPorcent'] == 1){
					$articles['pVenta'] = $pUnit + ($pUnit * ($articles['artMargin'] / 100));
				} else {
					$articles['pVenta'] = $pUnit + $articles['artMargin'];
				}

				$art[] = $articles;
			}
		}

		return $art;
	}

	function searchByCode($data = null){
		$str = '';
		if($data != null){
			$str = $data['code'];
		}

		$art = array();
		$this->db->select('*');
		$this->db->from('articles');
		$this->db->where(array('artEstado' =>'AC', 'artBarCode' => $str));

		$query = $this->db->get();
		if ($query->num_rows()!=0)
		{
			$arts = $query->result_array();
			$arts = $arts[0];

			//Calcular precio
			$pUnit = $arts['artCoste'];

			if($arts['artMarginIsPorcent'] == 1){
				$arts['pVenta'] = $pUnit + ($pUnit * ($arts['artMargin'] / 100));
			} else {
				$arts['pVenta'] = $pUnit + $arts['artMargin'];
			}
			$art = $arts;
		}

		return $art;
	}

	public function update_prices_by_rubro($data){


		if(isset($data['artMarginIsPorcent'])){
			$this->db->set('artCoste','artCoste + ( (artCoste*'.$data['incrementValue'].') /100)',FALSE);
		}else{
			$this->db->set('artCoste','artCoste +'.$data['incrementValue'].'',FALSE);
		}


		if($data['subrId']==''){
			$this->db->select('subrId')->where('rubId',$data['rubId'])->from('subrubros');
			$subQuery =  $this->db->get_compiled_select();
			$this->db->where("subrId IN (".$subQuery.")", NULL, FALSE);
		}else{
			$this->db->where('subrId',$data['subrId']);
		}

		if($this->db->update("articles")){
			return true;
		}else{
			return false;
		}
	}

}
?>
