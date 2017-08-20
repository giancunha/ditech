<?php
if($_POST['nome'] == '' or $_POST['email'] == ''){
    $aviso = "Campo(s) obrigatório(s):";
    if ($_POST['nome'] == ''){
        $aviso .= "\\n- Nome"; 
    }
    if ($_POST['email'] == ''){
        $aviso .= "\\n- E-mail"; 
    }
    echo exibeAlerta($aviso, "voltar");
    exit();
}

$idUsuario = $_POST['idUsuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$usuario = new Usuario;
$usuario->setIdUsuario( $idUsuario );
$usuario->setNome( $nome );
$usuario->setEmail( $email );

if($usuario->selecionaEmail() and $usuario->getEmail() != $_POST['emailAtual']){
    echo exibeAlerta("E-mail " . $usuario->getEmail() . " já cadastrado!\\nFavor informe outro.", "voltar");
}


$altera = $usuario->altera();
if( $altera > 0 ){
    echo exibeAlerta('Dados atualizados com sucesso!', URL.'/'.$gets['0']);
}
?>