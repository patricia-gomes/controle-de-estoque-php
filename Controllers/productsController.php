<?php
class productsController extends Controller {

	public function index() {
		$dados = array();

		$dados['name_title'] = "Products | Controle de estoque";

		$this->load_template('products', $dados);
	}

	public function insert() {
		$dados = array();

		$dados['name_title'] = "Insert produt | Controle de estoque";

		$this->load_template('insert_produt', $dados);
	}
}