<?php
session_start();
define("BASE_URL", "https://localhost/controle_de_estoque");
/*Quando uma classe for instanciada em qualquer parte do sistema,
a função vai percorrer essas tres pastas para encontra-la*/
spl_autoload_register(function($class) {
	
	if(file_exists("controllers/".$class.".php")) {
		require __DIR__."/controllers/".$class.".php";//Carrega a classe especifica
		
	}else if(file_exists("models/".$class.".php")) {
		require __DIR__."/models/".$class.".php";
	} else if(file_exists("core/".$class.".php")) {
		require __DIR__."/core/".$class.".php";
	} else if(file_exists("helper/".$class.".php")) {
		require __DIR__."/helper/".$class.".php";
	}

});

$core = new Core();
$core->run();