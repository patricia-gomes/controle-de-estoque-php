<?php
class productsController extends Controller {

	public function index() {
		$dados = array();
		$model = new Model;
		$helper = new Helper();

		//Selecionar todos os produtos
		$all_products = $model->Select_All('products');

		//Endia os dados para a view
		$dados['name_title'] = "Products | Controle de estoque";
		$dados['helper'] = $helper;
		$dados['all_products'] = $all_products;

		$this->load_template('products', $dados);
	}

	public function insert() {
		$dados = array();

		//Envia os dados para a view
		$dados['name_title'] = "Insert produt | Controle de estoque";

		$this->load_template('insert_produt', $dados);
	}

	public function register() {
		$model = new Model;

		if(!empty($_POST['name']) && !empty($_POST['value']) && !empty($_FILES['img'])) {
			$name = $_POST['name'];
			$value = $_POST['value'];

			/* Upload de imagem
			* Vai armazenar a imagem em uma pasta chamada uploads
			*/
			//Verificando se a img existe
			if(!empty($_FILES['img']['tmp_name'])) {
				if($_FILES['img']['type'] == 'image/png') {
					$newName = 'img_'.md5(rand(0,99)).'.png';

				} else if($_FILES['img']['type'] == 'image/jpg') {
					$newName = 'img_'.md5(rand(0,99)).'.jpg';

				} else if($_FILES['img']['type'] == 'image/jpeg') {
					$newName = 'img_'.md5(rand(0,99)).'.jpeg';
				}
				$path_img = 'uploads/'.$newName;
				//Move a imagem para a pasta uploads
				move_uploaded_file($_FILES['img']['tmp_name'], $path_img);
			}
			//.upload de imagem

			//Envia os dados para o banco
			$model->Insert('products', array('name'=>$name, 'value_medium'=> $value, 'url_img_product'=>$path_img));
			//redireciona para a exibição de produtos
			header('Location: '.BASE_URL.'/products');
		}
	}
}