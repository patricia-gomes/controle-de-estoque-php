<?php
namespace App\Models;
use App\Core\Model;

class Supplier extends Model 
{

	public function select_state_from_supplier($id) 
	{
		$query = "SELECT supplier.id_state, states.name_state FROM supplier 
		INNER JOIN states ON states.id = supplier.id_state
		WHERE states.id = $id";
		$result = $this->pdo->query($query);

		if($result->rowCount() > 0) {
			$result = $result->fetch();
			return $result['name_state'];
		}
	}
	//Verifica no banco se um fornecedor esta relacionado a tabela entry
	public function check_supplier($id_supplier) 
	{
		foreach($id_supplier as $value) { 
			$query_verification = "SELECT entry.id_supplier, supplier.id FROM entry
				INNER JOIN supplier ON supplier.id = entry.id_supplier
				WHERE entry.id_supplier = $value";
		}
		$result = $this->pdo->query($query_verification);

		if($result->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
}