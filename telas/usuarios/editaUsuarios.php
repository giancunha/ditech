<?php
  $usuario = new Usuario();
  $usuario->setidUsuario($gets['2']);
  $usuario->seleciona();
?>
<h1>Edita Usuário - <?php echo $usuario->getNome(); ?></h1>
<div>
    <form action="<?php echo URL."/".$gets[0].'/altera'.ucfirst($gets[0]); ?>" method="post" id="formulario">
        <input type="hidden" name="idUsuario" value="<?php echo $usuario->getIdUsuario(); ?>" />
        <div>
            <label>Nome</label>
            <input type="text" name="nome" maxlength="100" required value="<?php echo $usuario->getNome(); ?>" />
        </div>
        <div>
            <label>E-mail</label>
            <input type="text" name="email" maxlength="75" required value="<?php echo $usuario->getEmail(); ?>" />
            <input type="hidden" name="emailAtual" value="<?php echo $usuario->getEmail(); ?>" />
        </div>
        <div>
            <button type="submit">Atualizar</button>
            <button type="button" onclick="history.go(-1);">Voltar</button>
        </div>
    </form>
</div>