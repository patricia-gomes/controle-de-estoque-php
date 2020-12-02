<?php
class Security extends Model {

	public function __construct() {
		/*Verifica se a session exite ou esta vazia para redirecionar para o login*/
		if(!isset($_SESSION['loggedin']) || empty($_SESSION['loggedin'])) {
			header('Location: '.BASE_URL.'login');
		}
	}
}