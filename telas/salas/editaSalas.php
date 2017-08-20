<?php
  $sala = new Sala();
  $sala->setIdSala($gets['2']);
  $sala->seleciona();
?>
<h1>Edita Sala - <?php echo $sala->getNome(); ?></h1>
<div>
    <form action="<?php echo URL."/".$gets[0].'/altera'.ucfirst($gets[0]); ?>" method="post" id="formulario">
        <input type="hidden" name="idSala" value="<?php echo $sala->getIdSala(); ?>" />
        <div>
            <label>Nome</label>
            <input type="text" name="nome" maxlength="50" required value="<?php echo $sala->getNome(); ?>" />
            <input type="hidden" name="nomeAtual" value="<?php echo $sala->getNome(); ?>" />
        </div>
        <div>
            <label>Descrição</label>
            <input type="text" name="descricao" maxlength="100" required value="<?php echo $sala->getDescricao(); ?>" />
        </div>
        <div>
            <button type="submit">Atualizar</button>
            <button type="button" onclick="history.go(-1);">Voltar</button>
        </div>
    </form>
</div>