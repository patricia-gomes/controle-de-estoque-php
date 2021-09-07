<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Supplier;
use App\Helper\Helper;
use App\Models\Search_form;
use App\Core\Model;

class supplierController extends Controller 
{

	public function index() 
	{
		$model = new Model();
		$supplier = new Supplier();

		//Verificando se fez o login caso contrario redireciona para login
		if(!isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])) { 
			header("Location: ".BASE_URL."/login");
		}
		//--------------------------------------------------------------------------

		//Seleciona todos os fornecedores
		$all_supplier = $model->Select_All('supplier');

		//Envia os dados para a view
		$dados['name_title'] = "Supplier | Controle de Estoque";
		$dados['supplier'] = $supplier;
		$dados['all_supplier'] = $all_supplier;

		$this->load_template('supplier', $dados);
	}

	public function insert() 
	{
		$model = new Model();

		//Seleciona todos os estados
		$states_all = $model->Select_All('states');

		//Envia os dados para a view
		$dados['name_title'] = "Supplier | Controle de Estoque";
		$dados['states_all'] = $states_all;

		$this->load_template('insert_supplier', $dados);
	}

	public function search() 
	{
		$fetch = new Search_form();
		$helper = new Helper();
		$supplier = new Supplier();
		$result = array();

		$search = $_POST['search'];
		//Busca
		$result = $fetch->search('supplier', 'name', 'city', $search);

		//Envia os dados para a view
		$dados['name_title'] = "$search | Controle de estoque";
		$dados['helper'] = $helper;
		$dados['supplier'] = $supplier;
		$dados['result'] = $result;

		$this->load_template('search_supplier', $dados);
	}

	//Insere os dados de fornecedor (supplier) no banco
	public function register() 
	{
		$model = new Model();
		
		if(!empty($_POST['name']) && !empty($_POST['cnpj']) && !empty($_POST['address']) && !empty($_POST['number_address']) && !empty($_POST['neighborhood']) && !empty($_POST['phone']) && !empty($_POST['city']) && !empty($_POST['id_state']) && !empty($_POST['email']))  {

			$name = $_POST['name'];
			$cnpj = $_POST['cnpj'];
			$address = $_POST['address'];
			$number_address = $_POST['number_address'];
			$neighborhood = $_POST['neighborhood'];
			$phone = $_POST['phone'];
			$city = $_POST['city'];
			$id_state = $_POST['id_state'];
			$email = $_POST['email'];

			$model->Insert('supplier', array(
				'name' => $name,
				'cnpj' => $cnpj,
				'address' => $address,
				'number_address' => $number_address,
				'neighborhood' => $neighborhood,
				'phone' => $phone,
				'city' => $city,
				'id_state' => $id_state,
				'email' => $email
			));
			//Redireciona para exibição de fornecedores (supplier)
			header('Location: '.BASE_URL.'/supplier');
		}
	}

	public function edit($id_supplier) 
	{
		$model = new Model();
		$supplier = new Supplier();

		//Verifica se o id do fornecedor foi enviado para buscar as informações dele no banco 
		if(!empty($id_supplier)) {
			//Retorna todas as informaçoes de fornedor
			$data_supplier = $model->Select_With_Where('supplier', array('id' => $id_supplier));
			//Retorna o estado do fornecedor
			$state_supplier = $supplier->select_state_from_supplier($id_supplier);
		}

		//Seleciona todos os estados
		$states_all = $model->Select_All('states');

		//Envia os dados para a view
		$dados['name_title'] = "Edit supplier | Controle de estoque";
		$dados['supplier'] = $supplier;
		$dados['data_supplier'] = $data_supplier;
		$dados['state_supplier'] = $state_supplier;
		$dados['states_all'] = $states_all;

		$this->load_template('edit_supplier', $dados);
	}
	//Atualiza as informações de fornedores no banco
	public function update() 
	{
		$model = new Model();
		$supplier = new Supplier();

		//Verifica se o id do fornecedor foi enviado para atualizar pelo id
		if(!empty($_POST['id_supplier'])) {
			//Pode alterar qualquer coluna
			if(!empty($_POST['name']) || !empty($_POST['email']) ||!empty($_POST['phone']) || !empty($_POST['cnpj']) || !empty($_POST['address']) || !empty($_POST['number_address']) || !empty($_POST['neighborhood']) || !empty($_POST['city']) || !empty($_POST['id_state'])) {
				$name = addslashes($_POST['name']);
				$email = addslashes($_POST['email']);
				$phone = addslashes($_POST['phone']);
				$cnpj = addslashes($_POST['cnpj']);
				$address = addslashes($_POST['address']);
				$number_address = addslashes($_POST['number_address']);
				$neighborhood = addslashes($_POST['neighborhood']);
				$city = addslashes($_POST['city']);
				$id_state = addslashes($_POST['id_state']);

				//Atualiza as duas colunas no banco
				$model->Update_With_Where('supplier', array(
					'name' => $name,
					'email' => $email,
					'phone' => $phone,
					'cnpj' => $cnpj,
					'address' => $address,
					'number_address' => $number_address,
					'neighborhood' => $neighborhood,
					'city' => $city,
					'id_state' => $id_state
				), array('id'=> $_POST['id_supplier']));
				header('Location: '.BASE_URL.'/supplier');
			}
		}
	}
	//Deleta um fornecedor que não esta vinculado a nenhuma outra tabela
	public function delete() 
	{
		$model = new Model();

		$model->Delete_With_Where('supplier', array('id' => $_POST['id_supplier']));
		header('Location: '.BASE_URL.'/supplier');
	}
}