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

if($sala->selecionaSala() and $sala->getNome() != $_POST['nomeAtual']){
    echo exibeAlerta($sala->getNome() . " já cadastrada!\\nFavor informe outra.", "voltar");
    exit();
}

$altera = $sala->altera();
if( $altera > 0 ){
    echo exibeAlerta('Dados atualizados com sucesso!', URL.'/'.$gets['0']);
}
?>