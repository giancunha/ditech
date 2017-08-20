<?php
include_once("config/includes.php");
if(logado()){
    $usuario = unserialize($_SESSION['usuario_adm_'.SESSAOADM]);
    include("estrutura.php");
}else{
    include("acesso.php");
}
?>