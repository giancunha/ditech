<?php
if($_POST['nome'] == '' or $_POST['email'] == '' or $_POST['senha'] == ''){
    $aviso = "Campo(s) obrigatório(s):";
    if ($_POST['nome'] == ''){
        $aviso .= "\\n- Nome"; 
    }
    if ($_POST['email'] == ''){
        $aviso .= "\\n- E-mail"; 
    }
    if ($_POST['senha'] == ''){
        $aviso .= "\\n- Senha"; 
    }
    echo exibeAlerta($aviso, "voltar");
    exit();
}

$idUsuario = $_POST['idUsuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario;
$usuario->setIdUsuario( $idUsuario );
$usuario->setNome( $nome );
$usuario->setEmail( $email );
$usuario->setSenha( $senha );

if($usuario->selecionaEmail()){
    echo exibeAlerta("E-mail " . $usuario->getEmail() . " já cadastrado!\\nFavor informe outro.", "voltar");
}

$insere = $usuario->insere();
if( $insere > 0 ){
    echo exibeAlerta('Cadastro efetuado com sucesso!', URL.'/'.$gets['0']);
}
?>