<?php
namespace App\Core;
use App\Models\Products;
use App\Models\Supplier;

class Model
{
	/*
	* Classe com CRUD e informaçoes do banco de dados
	* A propriedade $pdo esta como 'protected' porque vai ser utilizada em outras classes dentro de Models
	*/

	protected $pdo;
	private $host;
	private $user;
	private $pass;
	private $dbname;
	private $charset = "utf8";

	public function __construct()
	{
		switch($_SERVER['HTTP_HOST']) {
			case "localhost":
				if (!defined('BASE_URL')) define('BASE_URL', 'https://localhost/controle_de_estoque');
				$this->host = "localhost";
				$this->user = "root";
				$this->pass = "";
				$this->dbname  = "controle_de_estoque";
			break;
			default:
				if (!defined('BASE_URL')) define('BASE_URL', 'https://controle-de-estoque-php.herokuapp.com');
				//Get Heroku ClearDB connection information
				$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
				$this->host = $cleardb_url["host"];
				$this->user = $cleardb_url["user"];
				$this->pass = $cleardb_url["pass"];
				$this->dbname = substr($cleardb_url["path"],1);
				$active_group = 'default';
				$query_builder = TRUE;
			break;
		}
		
		try {
			$this->pdo = new \PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset, $this->user, $this->pass);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e) {
			echo "Error Connection: ".$e->getMessage();exit;
		}
	}
	
	//Seleciona todas as colunas de qualquer tabela
	public function Select_All($table)
	{
		$query = "SELECT * FROM {$table}";
		$query = $this->pdo->query($query);
		//Verifica se retornou algum dado do banco antes de armazenar na propriedade $result
		if($query->rowCount() > 0) {
			return $query->fetchAll(\PDO::FETCH_ASSOC);
		}
	}
	//Retorna a quantidade de registros tem uma tabela
	public function rowCount($table)
	{
		$sql = "SELECT count(id) as qt FROM {$table}";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			$quant = $sql->fetch();
			return $quant['qt'];
		} else {
			return 0;
		}
	}

	//Seleciona todos as colunas em qualquer tabela utilizando a clausula  where
	public function Select_With_Where($table, $where = array())
	{
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
	public function Insert($table, $colunas = array())
	{
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
	public function Update_With_Where($table, $newDados = array(), $where = array())
	{
		
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

	/* ----Deleta um dado por vez com base no id em qualquer tabela----
	* Antes de apagar verifica se produto esta vinculado a uma das
	* duas tabelas: entry e exits. 
	* Se o produto estiver relacionado a uma delas o mysql impede de apaga-las,
	* por causa da chave estrangeira. Então, devemos remover primeiro os registros que tem o
	* id do produto em uma das 3 tabelas para depois apagar o produto.
	* A mesma coisa com fornecedor(supplier) para apaga-lo verifico se tem algum registro com 
	* o id dele vinculado a tabela entry.
	*/
	public function Delete_With_Where($table, $where)
	{
		$product = new Products();
		$supplier = new Supplier();

		//Verifica se as variaveis nao estao vazias
		if(!empty($table) && !empty($where)) {

			if($table == 'supplier') {
				if($supplier->check_supplier($where) == false) {
					//Deleta o fornecedor que não esta vinculado a tabela supplier
					$query = "DELETE FROM {$table} WHERE ";
					foreach ($where as $coluna => $value) {
						$query.= "$coluna = {$value}";
					}
					$this->pdo->query($query);
				}
			} else if($table == 'products' || $table == 'entry') {
					/* Deleta o produto que não esta vinculado a tabela products */
					$query = "DELETE FROM {$table} WHERE ";
					foreach ($where as $coluna => $value) {
						$query.= "$coluna = {$value}";
					}
					$this->pdo->query($query);
				
			} else if($table == 'exits') {
				if($product->check_product($where) == false) {
					/* Deleta o produto que não esta vinculado a tabela exits */
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