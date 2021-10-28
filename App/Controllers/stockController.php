<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Core\Model;

class stockController extends Controller 
{


	public function index() 
	{
		$model = new Model();
		$info_product_with_id = array();
		$info_product = array();
		$info_supplier = array();

		//Verificando se fez o login caso contrario redireciona para login
		if(!isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])) { 
			header("Location: ".BASE_URL."/login");
		}
		//--------------------------------------------------------------------------

		//Se o id do produto for enviado, seleciona pelo id
		if(!empty($_POST['id'])) {
			$info_product_with_id = $model->Select_With_Where('products', array('id'=>$_POST['id']));
		} else {
			$info_product = $model->Select_All('products');
		}
		$info_supplier = $model->Select_All('supplier');

		$dados['name_title'] = "Stock | Controle de Estoque";
		$dados['info_product'] = $info_product;
		$dados['info_supplier'] = $info_supplier;
		$dados['info_product_with_id'] = $info_product_with_id;

		$this->load_template('insert_stock', $dados);
	}

	public function insert() 
	{
		$model = new Model();

		if(!empty($_POST['id_supplier']) && !empty($_POST['id_product']) && !empty($_POST['quant']) && !empty($_POST['value_product']) && !empty($_POST['value_total'])) {
			$id_supplier = $_POST['id_supplier'];
			$id_product = $_POST['id_product'];
			$quant = $_POST['quant'];
			$value_product = str_replace(',', '.', $_POST['value_product']);
			$value_total =  str_replace(',', '.', $_POST['value_total']);
			date_default_timezone_set('America/Porto_Velho');

			//Bloqueia valores monetarios invalidos
			if($value_product == '0.0' ||  $value_product == '0.00' || $value_product == '0' ||  $value_product == '0.') {
				header('Location: '.BASE_URL.'/stock/index');
				exit;
			}

			if(!empty($_POST['expirion_date'])) {
				$expirion_date = $_POST['expirion_date'];
			} else {
				$expirion_date = "NULL";
			}

			$name_product = $model->Select_With_Where('products', array('id'=>$id_product));
				foreach($name_product as $value) {
					$name_product = $value['name'];
				}
			
			$name_supplier = $model->Select_With_Where('supplier', array('id'=>$id_supplier));
				foreach($name_supplier as $value) {
					$name_supplier = $value['name'];
				}

			$model->Insert('entry', array(
				'name_product'=> $name_product,
				'name_supplier'=> $name_supplier,
				'value_product'=> $value_product,
				'quant_product'=> $quant,
				'value_total'=> $value_total,
				'expirion_date'=> $expirion_date,
				'id_supplier'=> $id_supplier,
				'id_product'=> $id_product,
				'date_time' => date("Y-m-d H:i:s")
			));
			header('Location: '.BASE_URL.'/entry');
		} else {
			header('Location: '.BASE_URL.'/stock/index');
		}
	}

}