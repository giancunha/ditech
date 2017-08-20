<h1>Cadastra Usuário</h1>
<div>
  <form action="<?php echo URL."/".$gets[0].'/salva'.ucfirst($gets[0]); ?>" method="post" id="formulario">
      <div>
          <label>Nome</label>
          <input type="text" name="nome" maxlength="100" required />
      </div>
      <div>
          <label>E-mail</label>
          <input type="text" name="email" maxlength="75" required />
      </div>
      <div>
          <label>Senha</label>
          <input type="password" name="senha" maxlength="20" required />
      </div>
      <div>
          <button type="submit">Cadastrar</button>
          <button type="button" onclick="history.go(-1);">Voltar</button>
      </div>
  </form>
</div>