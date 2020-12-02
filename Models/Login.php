<?php
class Login extends Model {

	public function verificar_login(string $user, string $password) {
		//Busca no banco se o usuario e a senha estao cadastrada
		$query = "SELECT * FROM users WHERE user = :user AND password = :password";
		$query = $this->pdo->prepare($query);
		$query->bindValue(':user', $user);
		$query->bindValue(':password', md5($password));
		$query->execute();

		/*Se retornar resultado guarda o id do usuario cadastrado na sessao
		 para poder dar acesso ao dashboard */
		if($query->rowCount() > 0) {
			$query = $query->fetch();
			//Se a session ainda nao foi iniciada vai ser startada
			if(!isset($_SESSION)) {
				session_start();
			}
			$_SESSION['loggedin'] = $query['id'];
			return true;
		} else {
			return false;
		}
	}
}