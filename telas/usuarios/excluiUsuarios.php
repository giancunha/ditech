<?php
    $usuario = new Usuario();
    $usuario->setIdUsuario($gets['2']);
    $usuario->seleciona();
	if($usuario->exclui()){
        echo exibeAlerta('Exclusão efetuada com sucesso!', URL.'/'.$gets['0']);
    }
?>