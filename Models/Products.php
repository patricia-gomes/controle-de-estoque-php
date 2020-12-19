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
}