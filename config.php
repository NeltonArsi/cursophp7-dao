<?php  
//ARQUIVO DE CONFIGURAÇÃO

spl_autoload_register(function($nameClass){
	$dirClass = "class";
	//DIRECTORY_SEPARATOR usará a \ ou / atendendo windows e linux
	$filename = $dirClass . DIRECTORY_SEPARATOR . $nameClass . ".php";
	//$filename = $nameClass . ".php";
	if (file_exists($filename)){
		require_once ($filename);
	}
});



?>