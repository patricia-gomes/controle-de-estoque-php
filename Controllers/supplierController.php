<?php
class supplierController extends Controller {

	public function index() {
		$dados['name_title'] = "Supplier | Controle de Estoque";

		$this->load_template('supplier', $dados);
	}

	public function insert() {
		$dados['name_title'] = "Supplier | Controle de Estoque";

		$this->load_template('insert_supplier', $dados);
	}
}