<?php
namespace App\Models;
use App\Core\Model;

class Exits extends Model
{

	public function select_a_column($name_column, $table, $id)
	{
		$query = $this->pdo->query("SELECT {$name_column} FROM {$table} WHERE id = {$id}");
		$query->execute();

		if($query->rowCount() > 0) {
			return $query->fetch();
		}
	}
}