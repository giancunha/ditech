<h1>Usuários</h1>
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $resultado = Usuario::listaPrincipal( );
    foreach($resultado as $chave => $valor){
    ?>
            <tr data-id="<?php echo $valor->getIdUsuario(); ?>">
                <td><?php echo exibeId($valor->getIdUsuario()); ?></td>
                <td><?php echo $valor->getNome(); ?></td>
                <td><?php echo $valor->getEmail(); ?></td>
                <td style="text-align:right">
                    <a href="<?php echo URL."/".$gets[0]."/edita".ucfirst($gets[0]); ?>/<?php echo $valor->getIdUsuario(); ?>">Editar</a>
                </td>
                <td style="text-align:right">
                    <a href="<?php echo URL."/".$gets[0]."/exclui".ucfirst($gets[0]); ?>/<?php echo $valor->getIdUsuario(); ?>" onclick="return duvida('Ao excluir o usuário, todas suas reservas serão excluidas.\nDeseja prosseguir?');">Excluir</a>
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
</div>