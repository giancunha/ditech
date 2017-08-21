<?php
  $reserva = new Reserva();
  $reserva->setIdReserva($gets['2']);
  $reserva->seleciona();
  $sala = new Sala();
  $sala->setIdSala($reserva->getIdSala());
  $sala->seleciona();
  //VERIFICA SE USUÁRIO LOGADO É PROPRIETÁRIO DA RESERVA
  $usuario = unserialize($_SESSION['usuario_adm_'.SESSAOADM]);
  $idUsuario = $usuario->getIdUsuario();
  if($idUsuario != $reserva->getIdUsuario()){
    echo exibeAlerta("Você não tem permissão para acessar essa reserva!", "voltar");
    exit();
  }
?>
<h1>Edita Reserva - <?php echo $sala->getNome(); ?> - <?php echo timeStamptoData($reserva->getHoraInicio(),'hora'); ?> - <?php echo timeStamptoData($reserva->getHoraFim(),'hora'); ?></h1>
<div>
    <form action="<?php echo URL."/".$gets[0].'/altera'.ucfirst($gets[0]); ?>" method="post" id="formulario">
        <input type="hidden" name="idReserva" value="<?php echo $reserva->getIdReserva(); ?>" />
        <div>
            <label>Data</label>
            <input type="input" name="data" maxlength="10" placeholder="dd/mm/aaaa" value="<?php echo timeStamptoData($reserva->getHoraInicio(),'data'); ?>" required />
        </div>
        <div>
            <label>Sala</label>
            <select name="sala" required>
                <option value=""> Selecione </option>
            <?php
            $resultado = Sala::listaPrincipal( );
            foreach($resultado as $chave => $valor){
                $selecionado = NULL;
                if($valor->getIdSala() == $reserva->getIdSala()){
                    $selecionado = ' selected';

                }
            ?>
                <option value="<?php echo $valor->getIdSala(); ?>"<?php echo $selecionado; ?>><?php echo $valor->getNome(); ?></option>
            <?php
            }
            ?>
            </select>
        </div>
        <div>
            <label>Hora</label>
            <select name="hora" required>
                <option value=""> Selecione </option>
            <?php
            for ($i=8; $i < 18; $i++) { 
                $horaInicio = exibeId($i,2).':00';
                $horaFim = exibeId($i+1,2).':00';
                $selecionado = NULL;
                if($i == timeStamptoData($reserva->getHoraInicio(),'hora')){
                    $selecionado = ' selected';
                }
            ?>
                <option value="<?php echo $i; ?>"<?php echo $selecionado; ?>><?php echo $horaInicio; ?> - <?php echo $horaFim; ?></option>
            <?php
            }
            ?>
            </select>
        </div>
        <div>
            <label>Descrição</label>
            <input type="text" name="descricao" maxlength="100" value="<?php echo $reserva->getDescricao(); ?>" />
        </div>
        <div>
            <button type="submit">Atualizar</button>
            <button type="button" onclick="history.go(-1);">Voltar</button>
        </div>
    </form>
</div>