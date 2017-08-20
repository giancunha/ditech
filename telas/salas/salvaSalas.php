<?php
if($_POST['nome'] == ''){
    $aviso = "Campo(s) obrigatório(s):";
    if ($_POST['nome'] == ''){
        $aviso .= "\\n- Nome"; 
    }
    echo exibeAlerta($aviso, "voltar");
    exit();
}

$idSala = $_POST['idSala'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

$sala = new Sala;
$sala->setIdSala( $idSala );
$sala->setNome( $nome );
$sala->setDescricao( $descricao );

if($sala->selecionaSala()){
    echo exibeAlerta($sala->getNome() . " já cadastrada!\\nFavor informe outra.", "voltar");
    exit();
}

$insere = $sala->insere();
if( $insere > 0 ){
    echo exibeAlerta('Cadastro efetuado com sucesso!', URL.'/'.$gets['0']);
}
?>