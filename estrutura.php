<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo EMPRESA; ?></title>
        <!-- htmlbuild:css -->
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/assets/estilos.css" >
        <!-- endbuild -->
    </head>
    <body>
        <!-- TOPO -->
        <div id="topo">
            <p>
                <a href="http://www.ditech.com.br" target="_blank">Ditech</a>
                <span class="direita">ADM <?php echo EMPRESA; ?></span>
            </p>
        </div>
        <div class="conteudo">
            <div class="header">
                <span>Você está logado como <b><?php echo $usuario->getnome(); ?></b>.</span>
            </div>
            <!-- MENU -->
            <div class="menu">
                <ul>
                    <li>
                        <a href="<?php echo URL; ?>/salas">Salas</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>/salas/cadastrar">Cadastrar</a></li>
                            <li><a href="<?php echo URL; ?>/salas">Visualizar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>/usuarios">Usuários</a>
                        <ul>
                            <li><a href="<?php echo URL; ?>/usuarios/cadastrar">Cadastrar</a></li>
                            <li><a href="<?php echo URL; ?>/usuarios">Visualizar</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo URL; ?>/sair.php">SAIR</a></li>
                </ul>
            </div>
            <!-- FIM MENU -->
        </div>
        <!-- FIM TOPO -->
        <!-- CONTEÚDO -->
        <div class="conteudo">
            <?php mostrapaginas(); ?>
        </div>
        <!-- FIM CONTEÚDO -->
        <!-- htmlbuild:js -->
        <script src="<?php echo URL; ?>/assets/scripts.js"></script>
        <!-- endbuild -->
        <!-- RODAPÉ -->
        <div id="rodape">
            <p>
                <span style="float: left; margin: 0px; padding: 0px; text-align: left; line-height: 25px;">
                    © Ditech <?= date('Y'); ?>. Todos os direitos reservados.
                </span>
            </p>
        </div>
        <!-- FIM RODAPÉ -->
        </body>
</html>