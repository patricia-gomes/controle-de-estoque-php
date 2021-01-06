<?php
class Helper {

	//Substitui o ponto pela vírgula nos preços dos produtos
	public function replace_point_in_comma($value) {
		return "R$".str_replace('.', ',', $value);
	}

	//Soma os valores dos array
	public function sum_quant_total($all_entry, $col_name){
		$sum = 0;
		foreach ($all_entry as $item) {
			if(is_numeric($item[$col_name])) {
				$sum += $item[$col_name];
			} 
		}
		return $sum;
	}
	//Soma todos os valores
	public function sum_value_total($value_total) {
		$sum = 0.00;
		foreach ($value_total as $item) {
			foreach($item as $key => $value) {
				$sum += $value;
			}
		}
		return "R$ ".number_format($sum, 2, ',', '.');//formato brasileiro
	}
}