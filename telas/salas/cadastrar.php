<h1>Cadastra Sala</h1>
<div>
  <form action="<?php echo URL."/".$gets[0].'/salva'.ucfirst($gets[0]); ?>" method="post" id="formulario">
      <div>
          <label>Nome</label>
          <input type="text" name="nome" maxlength="50" required />
      </div>
      <div>
          <label>Descrição</label>
          <input type="text" name="descricao" maxlength="100" />
      </div>
      <div>
          <button type="submit">Cadastrar</button>
          <button type="button" onclick="history.go(-1);">Voltar</button>
      </div>
  </form>
</div>