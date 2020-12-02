<?php
class Controller {

	//Carrega a view
	public function load_view(string $view_name, $view_data = array()) {
		extract($view_data);
		require 'Views/'.$view_name.'.php';
	}
	//Carrega o template
	public function load_template(string $view_name, $view_data = array()) {
		extract($view_data);
		require 'Views/template.php';
	}

	//Carrega o conteudo especifico dentro do template(cabeçalho e rodape)
	public function load_view_in_templete(string $view_name, $view_data = array()) {
		extract($view_data);
		require 'Views/'.$view_name.'.php';
	}
}