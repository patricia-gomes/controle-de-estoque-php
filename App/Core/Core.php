<?php
namespace App\Core;
/*Essa classe é responsavel em capturar tudo o que for digitad na url da página e dividi-la em Controller, Action e Params. A partir dessas três palavras poderemos acessar qualquer página dentro dessa aplicação.
E ainda verifica se o controller ou a action existe. E por último instânciar a classe do controller e a action e os parâmetros se forem enviados.*/
class Core 
{

	private $url;
	private $array_url;
	private $controller;
	private $action;
	private $params = array();
	private $run_controller;

	public function __construct() 
	{
		/*
		Vai rodar todos os metodos private na ordem certa antes do metodo run()
		*/
		$this->set_url();
		$this->array_url();
		$this->set_controller();
		$this->set_action();
		$this->set_params();
	}
	//Captura o que foi digitado na url da pagina
	private function set_url() 
	{
		/*Verifica se algo foi enviado na url, se sim captura, caso contrario a url padrao
		é controller login e action index */
		$this->url = isset($_GET['url']) ? $_GET['url'] : 'login/index';
		//echo $_GET['url'];
	}
	//Array da url
	private function array_url() 
	{
		//Separa por / a strig da $this->url retornando um array com a quantidade de palavras digitada na url
		$this->array_url = explode('/', $this->url);
		//print_r($this->array_url);exit;
	}
	//Define o controller
	private function set_controller() 
	{
		//Se o controller nao foi envido define como loginController
		$this->controller = (empty($this->array_url) || !isset($this->array_url)) ? 'loginController' : $this->array_url[0];
	}
	//Define a action
	private function set_action() 
	{
		//Apaga a primeira posiçao do array que esta vazia
		array_shift($this->array_url);
		//Se a action nao foi enviada a padrao é definida como index
		$this->action = (isset($this->array_url[0]) || !empty($this->array_url[0])) ? $this->array_url[0] : 'index';
	}
	//Define os parametros
	private function set_params() 
	{
		array_shift($this->array_url);//remove o controller, action
		//Tirando o controller e action o que vier depois é parametros
		if (count($this->array_url) > 0) {
			$this->params = $this->array_url;
		}
	}
	//Verifica se o controller existe
	private function validate_controller() 
	{ 
		//Se o controller digitado na url nao existir chama o notfoundController
		if(!file_exists('App/Controllers/'.$this->controller.'Controller.php')) {
			$this->controller = 'notfoundController';
			$this->action = 'index';
		}
	}
	//Verifica se o método ou action exite
	private function validate_action() 
	{
		//Se o metodo nao existir chama o notfoundController
		if(!method_exists($this->controller, $this->action)) {
			$this->controller = 'notfoundController';
			$this->action = 'index';
		}
	}

	/*Esse é o unico metodo que vai ser acessado fora dessa classe por isso esta como public.
	Vai ser chamado no index.php */
	public function run() 
	{
		$this->run_controller = "App\\Controllers\\".$this->controller.'Controller';//Endereço onde esta os controllers

		$this->validate_controller();
		
		//Instancia o controller
		$this->run_controller = new $this->run_controller();
		
		$this->validate_action();

		//Envia o controller a action e os parametros
		call_user_func_array(array($this->run_controller, $this->action), $this->params);
	}

}