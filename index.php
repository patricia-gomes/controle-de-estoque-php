<?php
session_start();
require 'config.php';
spl_autoload_register(function($class) {
/*Quando uma classe for instanciada em qualquer parte do sistema,
a função vai percorrer essas tres pastas para encontra-la*/
	
	if(file_exists("controllers/".$class.".php")) {
		require __DIR__."/controllers/".$class.".php";//Carrega a classe especifica
		
	}else if(file_exists("models/".$class.".php")) {
		require __DIR__."/models/".$class.".php";
	} else if(file_exists("core/".$class.".php")) {
		require __DIR__."/core/".$class.".php";
	}

});

$core = new Core();
$core->run();