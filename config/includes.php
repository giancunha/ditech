<?php
if(is_file("config/includes.php")){
	$caminho = "";
}
//CONFUGURAÇÕES
include_once($caminho . "config/funcoes.php");
include_once($caminho . "config/logado.php");
include_once($caminho . "class/BdSQL.php");
//CLASSES
include_once($caminho . "class/Sala.php");
include_once($caminho . "class/Usuario.php");
?>