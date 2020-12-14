<?php
class entryController extends Controller {


	public function index() {
		$dados['name_title'] = "Entry | Controle de Estoque";

		$this->load_template('entry', $dados);
	}
}