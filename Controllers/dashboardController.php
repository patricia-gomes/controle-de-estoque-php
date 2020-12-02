<?php
class dashboardController extends Controller {

	public function index() {
		//Verificando se fez o login caso contrario redireciona para login
		if(!isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])) { 
			header("Location: ".BASE_URL."/login");
		}
		$dados['name_title'] = "Controle de estoque | Patricia Gomes";

		$this->load_template('panel', $dados);
	}
}