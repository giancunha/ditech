<?php
    $reserva = new Reserva();
    $reserva->setIdReserva($gets['2']);
    $reserva->seleciona();
    //VERIFICA SE USUÁRIO LOGADO É PROPRIETÁRIO DA RESERVA
    $usuario = unserialize($_SESSION['usuario_adm_'.SESSAOADM]);
    $idUsuario = $usuario->getIdUsuario();
    if($idUsuario != $reserva->getIdUsuario()){
        echo exibeAlerta("Você não tem permissão para excluir essa reserva!", "voltar");
        exit();
    }
    //EXCLUI RESERVA
	if($reserva->exclui()){
        echo exibeAlerta('Exclusão efetuada com sucesso!', URL.'/'.$gets['0']);
    }
?>