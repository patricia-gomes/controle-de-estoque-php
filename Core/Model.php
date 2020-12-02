<?php
class Model extends Config {

	protected $pdo;

	public function __construct() {
		try {
			$this->pdo = new \PDO("mysql:host=".Config::HOST.";dbname=".Config::DBNAME.";charset=".Config::CHARSET, Config::USER, Config::PASS);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e) {
			echo "ERROR: ".$e->getMessage();exit;
		}
	}
} 