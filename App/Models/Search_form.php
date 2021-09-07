<?php
namespace App\Models;
use App\Core\Model;

class Search_form extends Model
{

	//Busca pelo nome do produto quanto pelo nome do fornecedor
	public function search($name_table, $col_name1, $col_name2, $search) 
	{

		$query = $this->pdo->query("SELECT * FROM $name_table WHERE ($col_name1 LIKE '%".$search."%' OR ($col_name2 LIKE '%".$search."%'))");
		$query->execute();

		if($query->rowCount() > 0) {
			return $query->fetchAll(PDO::FETCH_ASSOC);
		} else { return false; }
	}
}