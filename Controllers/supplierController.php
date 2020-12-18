<?php
class supplierController extends Controller {

	public function index() {
		$dados['name_title'] = "Supplier | Controle de Estoque";

		$this->load_template('supplier', $dados);
	}

	public function insert() {
		$model = new Model();

		//Seleciona todos os estados
		$states_all = $model->Select_All('states');

		//Envia os dados para a view
		$dados['name_title'] = "Supplier | Controle de Estoque";
		$dados['states_all'] = $states_all;

		$this->load_template('insert_supplier', $dados);
	}
	//Insere os dados de fornecedor (supplier) no banco
	public function register() {
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
}