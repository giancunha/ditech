<h1>Todas Reservas</h1>
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Responsável</th>
                <th>Sala</th>
                <th>Descrição</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
    <?php
    $resultado = Reserva::listaPrincipal( );
    foreach($resultado as $chave => $valor){
        $usuario = new Usuario();
        $usuario->setIdUsuario($valor->getIdUsuario());
        $usuario->seleciona();
        $sala = new Sala();
        $sala->setIdSala($valor->getIdSala());
        $sala->seleciona();
    ?>
            <tr data-id="<?php echo $valor->getIdReserva(); ?>">
                <td><?php echo exibeId($valor->getIdReserva()); ?></td>
                <td><?php echo timeStamptoData($valor->getHoraInicio(),'data'); ?></td>
                <td><?php echo timeStamptoData($valor->getHoraInicio(),'hora'); ?> - <?php echo timeStamptoData($valor->getHoraFim(),'hora'); ?></td>
                <td><?php echo $usuario->getNome(); ?></td>
                <td><?php echo $sala->getNome(); ?></td>
                <td><?php echo $valor->getDescricao(); ?></td>
                <td style="text-align:right">
                    <a href="<?php echo URL."/".$gets[0]."/edita".ucfirst($gets[0]); ?>/<?php echo $valor->getIdReserva(); ?>">Editar</a>
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
</div>