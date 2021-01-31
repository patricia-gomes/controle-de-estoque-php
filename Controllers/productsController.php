<?php
class productsController extends Controller {

	public function index() {
		$dados = array();
		$model = new Model;
		$helper = new Helper();

		//Verificando se fez o login caso contrario redireciona para login
		if(!isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])) { 
			header("Location: ".BASE_URL."/login");
		}
		//--------------------------------------------------------------------------

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
		$products = new Products();

		if(!empty($_POST['name']) && !empty($_POST['value']) && !empty($_FILES['img'])) {
			$name = $_POST['name'];
			//Para o banco de dados aceitar o preço tem de ser inserido com ponto
			$value = str_replace(',', '.', $_POST['value']);
			
			$path_img = $products->upload_img($_FILES['img']);
			//Envia os dados para o banco
			$model->Insert('products', array('name'=> $name, 'value_medium'=> $value, 'url_img_product'=>$path_img));

			//redireciona para a exibição de produtos
			header('Location: '.BASE_URL.'/products');
		}
	}

	public function search() {
		$fetch = new Search_form();
		$helper = new Helper();
		$result = array();

		$search = $_POST['search'];
		//Busca
		$result = $fetch->search('products', 'name', 'value_medium', $search);

		//Envia os dados para a view
		$dados['name_title'] = "$search | Controle de estoque";
		$dados['helper'] = $helper;
		$dados['result'] = $result;

		$this->load_template('search_products', $dados);
	}

	public function edit($id) {
		$model = new Model;
		$helper = new Helper();

		//Verifica se o id foi enviado 
		if(!empty($id)) {
			//Seleciona todos os dados desse produto especifico pelo id
			$data_product = $model->Select_With_Where('products', array('id' => $id));
		}

		//Envia os dados para a view
		$dados['name_title'] = "Edit product | Controle de estoque";
		$dados['helper'] = $helper;
		$dados['data_product'] = $data_product;

		$this->load_template('edit_product', $dados);
	}
	//Atualiza as informações de produtos no banco
	public function update() {
		$model = new Model();
		$products = new Products();
		
		//Verifica se o id foi enviado para atualizar pelo id
		if(!empty($_POST['id_product'])) {
			//Altera
			if (!empty($_POST['name']) || !empty($_POST['value'])) {
				$value = str_replace('R$', ' ', $_POST['value']);//Substituindo R$ por ''
				$value = str_replace(',', '.', $value);//Substituindo , por .

				//Atualiza as duas colunas no banco
				$model->Update_With_Where('products', array(
					'name' => $_POST['name'],
					'value_medium' => $value
				), array('id' => $_POST['id_product']) );
				header('Location: '.BASE_URL.'/products');
			}
			//Altera a imagem
			if(!empty($_FILES['img']['tmp_name'])) {
				//Url da imagem
				$path_img = $products->upload_img($_FILES['img']);

				$model->Update_With_Where('products', array('url_img_product' => $path_img), array('id' => $_POST['id_product']));
			}
		}	
	}
	//Deleta um produto que não esta vinculado a nenhuma outra tabela
	public function delete() {
		$model = new Model();
		$product = new Products();

		$check_product_entry = $product->check_product_in_entry($_POST['id_product']);
		$check_product_exits = $product->check_product_in_exits($_POST['id_product']);

		/*Antes de remover tem de verificar se produto esta vinculado a outra tabela, se retornar 1 é porque o produto tem um registro em outra tabela */
		if($check_product_entry == 1) {
			header('Location: '.BASE_URL.'/products');

		} else if( $check_product_exits == 1) {
			header('Location: '.BASE_URL.'/products');

		} else {
			$model->Delete_With_Where('products', array('id' => $_POST['id_product']));
			header('Location: '.BASE_URL.'/products');
		}
	}
}