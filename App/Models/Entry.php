<?php
namespace App\Models;
use App\Core\Model;

class Entry extends Model
{

	//Subtrai valores inteiros
	public function SubtractQuantInt($quant_entry, $quant_exit)
	{
		return $quant_entry - $quant_exit;
	}
	//Subtrai valores monetarios
	public function SubtractValueMoney($value_total_entry, $value_total_exits)
	{
		$value_total_entry = str_replace(',', '.', $value_total_entry);
		$value_total_entry = str_replace('R$', '', $value_total_entry);
		$value_total_exits = str_replace(',', '.', $value_total_exits);
		$value_total_exits = str_replace('R$', '', $value_total_exits);
		return $value_total_entry - $value_total_exits;
	}
	/*Retorna o id máximo da tabela exits*/
	public function IdMax()
	{
		$query = $this->pdo->query("SELECT MAX(id) as max_id FROM exits");
		if($query->rowCount() > 0) { 
			$result = $query->fetch();
			return $result['max_id'];
		} else { return false; }
	}
	
	public function selectSpecificDadosEntry($info_exits) 
	{

		$query = "SELECT * FROM entry WHERE id = ";
		if(!empty($info_exits)) {
			foreach($info_exits as $col => $values) {
				$id_entry = $values;
			}
		} else { $id_entry['id_entry'] = 0; }
		$query.=$id_entry['id_entry'];
		$result = $this->pdo->query($query);
		if($result->rowCount() > 0) { 
			return $result->fetch(\PDO::FETCH_ASSOC);
		}
	}

	public function select_entry_products() 
	{
		$query = $this->pdo->query("SELECT * FROM entry WHERE quant_product > 0");
		$query->execute();

		if($query->rowCount() > 0) {
			return $query->fetchAll(\PDO::FETCH_ASSOC);
		}
	}

	//Seleciona apenas a coluna de validade do produto
	public function select_validity() 
	{
		$query = $this->pdo->query("SELECT * FROM entry WHERE expirion_date AND quant_product > 0");
		$query->execute();

		if($query->rowCount() > 0) {
			return $query->fetchAll(\PDO::FETCH_ASSOC);
		}
	}
}