<?php
class Products extends Model {

	//Upload de imagem
	public function upload_img($img) {
		/*  Vai armazenar a imagem em uma pasta chamada uploads*/

		//Verificando se a img existe
		if(!empty($img['tmp_name'])) {
			if($img['type'] == 'image/png') {
				$newName = 'img_'.md5(rand(0,99)).'.png';

			} else if($img['type'] == 'image/jpg') {
				$newName = 'img_'.md5(rand(0,99)).'.jpg';

			} else if($img['type'] == 'image/jpeg') {
				$newName = 'img_'.md5(rand(0,99)).'.jpeg';
			}
			$path_img = 'uploads/'.$newName;
			//Move a imagem para a pasta uploads
			move_uploaded_file($img['tmp_name'], $path_img);
			return $path_img;
		}
	}

	//Verifica no banco se um produto esta relacionado a tabela entry
	public function check_product($id_product) {
		foreach($id_product as $value) { 
			$query_verification = "SELECT entry.id_product, products.id FROM entry
				INNER JOIN products ON products.id = entry.id_product
				WHERE entry.id_product = $value";
		}
		$result = $this->pdo->query($query_verification);

		if($result->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function sum_value_total($table, $col_name) {
		$query = "SELECT {$col_name} FROM {$table}";
		$query = $this->pdo->query($query);

		if($query->rowCount() > 0) {
			return $query->fetchAll(\PDO::FETCH_ASSOC);
		}
	}
}