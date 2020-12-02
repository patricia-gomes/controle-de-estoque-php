<?php
class notfoundController extends Controller {

	public function index() {
		$dados = array();

		$this->load_view('notfound', $dados);
	}
}