<?php
class Helper {

	//Substitui o ponto pela vírgula nos preços dos produtos
	public function replace_point_in_comma($value) {
		return "R$".str_replace('.', ',', $value);
	}
}