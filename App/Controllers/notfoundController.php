<?php
namespace App\Controllers;
use App\Core\Controller;

class notfoundController extends Controller 
{

	public function index() 
	{
		$dados = array();

		$this->load_view('notfound', $dados);
	}
}