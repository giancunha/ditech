<?php
    $sala = new Sala();
    $sala->setIdSala($gets['2']);
    $sala->seleciona();
	if($sala->exclui()){
        echo exibeAlerta('Exclusão efetuada com sucesso!', URL.'/'.$gets['0']);
    }
?>