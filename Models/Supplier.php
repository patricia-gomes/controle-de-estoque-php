<?php
class Supplier extends Model {

	public function select_state_from_supplier($id) {
		$query = "SELECT supplier.id_state, states.name_state FROM supplier 
		INNER JOIN states ON states.id = supplier.id_state
		WHERE states.id = $id";
		$result = $this->pdo->query($query);

		if($result->rowCount() > 0) {
			$result = $result->fetch();
			return $result['name_state'];
		}
	}
}