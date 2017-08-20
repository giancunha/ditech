<h1>Salas</h1>
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $resultado = Sala::listaPrincipal( );
    foreach($resultado as $chave => $valor){
    ?>
            <tr data-id="<?php echo $valor->getIdSala(); ?>">
                <td><?php echo exibeId($valor->getIdSala()); ?></td>
                <td><?php echo $valor->getNome(); ?></td>
                <td><?php echo $valor->getDescricao(); ?></td>
                <td style="text-align:right">
                    <a href="<?php echo URL."/".$gets[0]."/edita".ucfirst($gets[0]); ?>/<?php echo $valor->getIdSala(); ?>">Editar</a>
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
</div>