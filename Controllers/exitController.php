<?php
class exitController extends Controller {

	public function index() {
		$dados['name_title'] = "Exit | Controle de estoque";

		$this->load_template('exit', $dados);
	}
}