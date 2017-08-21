<?php 
    if(!isset($_POST['data'])){
        $data = date('d/m/Y');
    } else {
        $data = $_POST['data'];
    }
    $usuario = unserialize($_SESSION['usuario_adm_'.SESSAOADM]);
    $idUsuario = $usuario->getIdUsuario();
?>
<h1>Reservas - <?php echo $data; ?></h1>
<form action="" method="POST">
    <input type="input" name="data" maxlength="10" placeholder="dd/mm/aaaa" value="<?php echo $data; ?>" required />
    <button type="submit">Filtrar</button>
</form>
<?php
$resultado = Sala::listaPrincipal( );
foreach($resultado as $chave => $valor){
?>
<h2><?php echo $valor->getNome(); ?></h2>
<sup><?php echo $valor->getDescricao(); ?></sup>
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <!--th>Data</th-->
                <th>Horário</th>
                <th>Responsável</th>
                <th>Descrição</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th colspan="6">&nbsp;</th>
            </tr>
        </tfoot>
        <tbody>
    <?php
        for ($i=8; $i < 18; $i++) { 
            $horaInicio = exibeId($i,2).':00';
            $horaFim = exibeId($i+1,2).':00';
            ?>
            <tr>
                <td value="<?php echo $i; ?>"><?php echo $horaInicio; ?> - <?php echo $horaFim; ?></option>
            <?php
            $resultado2 = Reserva::listaPorHora( $horaInicio, $valor->getIdSala(), dataToBase($data) );
            if(isset($resultado2['0'])){
                foreach($resultado2 as $chave2 => $valor2){
                    $usuario = new Usuario();
                    $usuario->setIdUsuario($valor2->getIdUsuario());
                    $usuario->seleciona();
            ?>
                <!--td><?php echo timeStamptoData($valor2->getHoraInicio(),'data'); ?></td-->
                <td><?php echo $usuario->getNome(); ?></td>
                <td><?php echo $valor2->getDescricao(); ?></td>
                <?php
                    if($idUsuario == $valor2->getIdUsuario()){
                ?>
                <td style="text-align:right">
                    <a href="<?php echo URL."/".$gets[0]."/edita".ucfirst($gets[0]); ?>/<?php echo $valor2->getIdReserva(); ?>">Editar</a>
                </td>
                <td style="text-align:right">
                    <a href="<?php echo URL."/".$gets[0]."/exclui".ucfirst($gets[0]); ?>/<?php echo $valor2->getIdReserva(); ?>" onclick="return duvida('Realmente deseja excluir essa reserva?');">Excluir</a>
                </td>
                <?php
                    } else {
                ?>
                <td colspan="2">
                    &nbsp;
                </td>
                <?php
                    }
                }
                ?>
            <?php
            } else {
            ?>   
                <td colspan="4">Livre</td>
            </tr>
            <?php
            }
            ?>
    <?php
        }
     ?>
        </tbody>
    </table>
    <br />
</div>
<?php
}
?>