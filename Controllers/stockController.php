<?php
class stockController extends Controller {


	public function index() {
		$dados['name_title'] = "Supplier | Controle de Estoque";

		$this->load_template('insert_stock', $dados);
	}
}