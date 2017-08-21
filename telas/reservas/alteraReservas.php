<?php
if($_POST['data'] == '' or $_POST['sala'] == '' or $_POST['hora'] == ''){
    $aviso = "Campo(s) obrigatório(s):";
    if ($_POST['data'] == ''){
        $aviso .= "\\n- Data"; 
    }
    if ($_POST['sala'] == ''){
        $aviso .= "\\n- Sala"; 
    }
    if ($_POST['hora'] == ''){
        $aviso .= "\\n- Hora"; 
    }
    echo exibeAlerta($aviso, "voltar");
    exit();
}
$usuario = unserialize($_SESSION['usuario_adm_'.SESSAOADM]);
$idReserva = $_POST['idReserva'];
$idUsuario = $usuario->getIdUsuario();
$data = $_POST['data'];
$idSala = $_POST['sala'];
$hora = $_POST['hora'];
$descricao = $_POST['descricao'];
$horaInicio = dataToBase($data) . " " . exibeId($hora,2) . ":00:00";
$horaFim = dataToBase($data) . " " . exibeId($hora+1,2) . ":00:00";

$reserva = new Reserva;
$reserva->setIdReserva( $idReserva );
$reserva->setIdUsuario( $idUsuario );
$reserva->setIdSala( $idSala );
$reserva->setHoraInicio( $horaInicio );
$reserva->setHoraFim( $horaFim );
$reserva->setDescricao( $descricao );

//Verifica se usuário já efetuou reserva no mesmo horário
if($reserva->selecionaPorUsuario( $idReserva )){
    echo exibeAlerta("Você já possui reserva em $data das " . exibeId($hora,2) . " às " . exibeId($hora+1,2) . "!\\nFavor informe outro horário.", "voltar");
    exit();
}

//Verifica se sala já reservada por outro usuário
if($reserva->selecionaPorSala( $idReserva )){
    echo exibeAlerta("Sala já reservada em $data das " . exibeId($hora,2) . " às " . exibeId($hora+1,2) . "!\\nFavor informe outro horário ou outra sala.", "voltar");
    exit();
}

$altera = $reserva->altera();
if( $altera > 0 ){
    echo exibeAlerta('Dados atualizados com sucesso!', URL.'/'.$gets['0']);
}
?>