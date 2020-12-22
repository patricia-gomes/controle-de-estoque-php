<?php
class Model extends Config {
	/*
	* Classe com conexao com o banco e CRUD básico
	* A propriedade $pdo esta como 'protected' porque vai ser utilizada em classes em Models
	*/
	protected $pdo;

	//Conexao com o banco de dados
	public function __construct() {
		try {
			$this->pdo = new \PDO("mysql:host=".Config::HOST.";dbname=".Config::DBNAME.";charset=".Config::CHARSET, Config::USER, Config::PASS);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e) {
			echo "ERROR: ".$e->getMessage();exit;
		}
	}

	//Seleciona todas as colunas de qualquer tabela
	public function Select_All($table) {
		$query = "SELECT * FROM {$table}";
		$query = $this->pdo->query($query);
		//Verifica se retornou algum dado do banco antes de armazenar na propriedade $result
		if($query->rowCount() > 0) {
			$result = $query->fetchAll(\PDO::FETCH_ASSOC);
			return $result;
		}
	}

	//Seleciona todos as colunas em qualquer tabela utilizando a clausula  where
	public function Select_With_Where($table, $where = array()) {
		//Verifica se a tabela e a clausula where foi enviada
		if(!empty($table) && !empty($where)) {
		$query = "SELECT * FROM {$table} WHERE ";
		
			foreach($where as $coluna => $value) {
				$query.="$coluna = '{$value}'";
			}
			$result =$this->pdo->query($query);
			//Verifica se existe algum dado cadastrado no banco
			if($result->rowCount() > 0) {
				$result = $result->fetchAll(\PDO::FETCH_ASSOC);
				return $result;
			}
		}
	}

	//Insere em qualquer tabela e em qualquer quantidade de coluna tiver essa tabela
	public function Insert($table, $colunas = array()) {
		$dados = array();

		//Perconrendo o array das colunas para pegar as colunas da tabela
		foreach($colunas as $coluna => $value) {
			$dados[] = "$coluna";
			$dados2[] = ":$coluna";
		}
		/*Montando a query ("INSERT INTO table (coluna1, coluna2) VALUES (:coluna1, :coluna2)") */
		$query = $this->pdo->prepare("INSERT INTO {$table} (".implode(', ', $dados).") VALUES (".implode(', ', $dados2).")");
		/*Percorre o array das colunas para vincular o valor a coluna*/
		foreach($colunas as $coluna => $value) {
			$query->bindValue(":$coluna", "$value");
		}
		$query->execute();
	}

	//Edita um dado por vez em qualquer tabela
	public function Update_With_Where($table, $newDados = array(), $where = array()) {
		
		if(!empty($table) && !empty($newDados) && !empty($where)) {
			/*query exemplo: UPDATE produtos SET coluna = 'value', coluna2 = 'value2' WHERE
			   coluna2 = value2;*/
			$query = "UPDATE {$table} SET ";
			/*Percorendo o array das colunas para pegar as colunas da tabela e montar a query*/
			foreach($newDados as $coluna => $value) {
				$dados[] = "$coluna = '$value'";
			}
			$query.= implode(', ', $dados);//Adiciona a vírgula menos a última
			//Percorendo o array do where e concatenando com o restante da query
			foreach($where as $id => $value_id) {
				$query.=" WHERE $id = {$value_id}";
			}
			$this->pdo->query($query);
		}
	}

	//Deleta um dado por vez com base no id em qualquer tabela
	public function Delete_With_Where($table, $where) {
		$product = new Products();
		$supplier = new Supplier();

		//Verifica se as variaveis nao estao vazias
		if(!empty($table) && !empty($where)) {
			/*Antes de apagar verifica se produto esta vinculado a tabela entry 
			* se o produto estiver relacionado a entry ele tem de remover
			* primeiro na tabela entry para depois apagar o produto
			*/
			if($table == 'supplier') {
				if($supplier->check_supplier($where) == false) {
					//Deleta o fornecedor que não esta vinculado a tabela entry
					$query = "DELETE FROM {$table} WHERE ";
					foreach ($where as $coluna => $value) {
						$query.= "$coluna = {$value}";
					}
					$this->pdo->query($query);
				}
			} else if($table == 'products') {
				if($product->check_product($where) == false) {
					/* Deleta o produto que não esta vinculado a tabela entry */
					$query = "DELETE FROM {$table} WHERE ";
					foreach ($where as $coluna => $value) {
						$query.= "$coluna = {$value}";
					}
					$this->pdo->query($query);
				}
			}
		}
	}
} 