<?php
include_once("config/includes.php");
$usuario = new Usuario();
$usuario->setemail($_POST["email"]);
$usuario->setsenha($_POST["senha"]);
if($usuario->login()) {
	$_SESSION['usuario_adm_' . SESSAOADM] = serialize($usuario);
	echo exibeAlerta("", URL);
} else {
    //printR($usuario);
	echo exibeAlerta("Seu login ou senha estão errados, ou seu acesso está desativado! Tente novamente", "./");
}
?>