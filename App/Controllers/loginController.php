<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Login;

class loginController extends Controller 
{

	public function index() 
	{
		$login = new Login();
		//verificano se o campo esta preenchido
		if(!empty($_POST['user']) && !empty($_POST['password'])) {
			$user = $_POST['user'];
			$password = $_POST['password'];
			//Envia os dados para o model para fazer a verificaçao
			if($login->verificar_login($user, $password)) {
				header("Location:".BASE_URL."/dashboard");/*Se tiver tudo correto redireciona para a painel de controle*/
			}
		}
		$this->load_view('login', $dados = array());
	}
}