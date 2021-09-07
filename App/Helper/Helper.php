<?php
namespace App\Helper;

class Helper
{

	//Substitui o ponto pela vírgula nos preços dos produtos
	public function replace_point_in_comma($value)
	{
		return str_replace('.', ',', $value);
	}

	//Soma todas as quantidade de produtos
	public function sum_quant_total($all_entry, $col_name)
	{
		$sum = 0;
		if(!empty($all_entry)) {
			foreach ($all_entry as $item) {
				if(is_numeric($item[$col_name])) {
					$sum += $item[$col_name];
				} 
			}
			return $sum;
		} else {
			return $sum;
		}
	}
	//Soma todos os valores total
	public function sum_value_total($value_total)
	{
		$sum = 0.00;
		if(!empty($value_total) && is_array($value_total)) {
			foreach ($value_total as $item) {
				foreach($item as $key => $value) {
					$sum += $value;
				}
			}
			return "R$ ".number_format($sum, 2, ',', '.');//formato brasileiro
		} else {
			return "R$ ".number_format($sum, 2, ',', '.');;
		}
	}
}