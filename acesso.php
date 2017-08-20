<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title><?php echo EMPRESA; ?></title>
</head>
<body>
    <form action="<?php echo URL ?>/entrar.php" method="post" accept-charset="utf-8">
        <h4>Login</h4>
        <p>Faça login para acessar a sua conta.</p>
        <input type="text" placeholder="E-mail" name="email" required="required">
        <input type="password" placeholder="Senha" name="senha" required="required">
        <button>Entrar</button>
    </form>
</body>
</html>