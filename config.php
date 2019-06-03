<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

$autoload = function ($class){
   include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

define('INCLUDE_PATH','http://localhost/aula/');
define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

define('BASE_DIR_PAINEL',__DIR__.'/painel');

//Conectar com banco de dados!
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','projeto_01');

//constante para painel de controle

   define('NOME_EMPRESA', '');



//funções do painel
function pegaCargo($indice){


	return Painel::$cargos[$indice];
}

function verificaPermissaoMenu($permissao){
	if($_SESSION['cargo'] >= $permissao){
		return;
	}else{
		echo 'style="display:none;"';
	}
	
}
function verificaPermissaoPagina($permissao){
if($_SESSION['cargo'] >= $permissao){
		return;
	}else{
		include('painel/pages/permissao_negada.php');
		die();
	}

}

?>
