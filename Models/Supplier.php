<?php
class Supplier extends Model {

	public function select_state_from_supplier() {
		$query = "SELECT supplier.id_state, states.id, states.name_state FROM supplier 
		INNER JOIN states ON states.id = supplier.id_state";
		$result = $this->pdo->query($query);

		if($result->rowCount() > 0) {
			return $result->fetch();
		}
	}
}