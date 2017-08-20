<h1>Cadastra Reserva</h1>
<div>
    <form action="<?php echo URL."/".$gets[0].'/salva'.ucfirst($gets[0]); ?>" method="post" id="formulario">
        <div>
            <label>Data</label>
            <input type="input" name="data" maxlength="10" placeholder="dd/mm/aaaa" value="<?php echo date('d/m/Y'); ?>" required />
        </div>
        <div>
            <label>Sala</label>
            <select name="sala" required>
                <option value=""> Selecione </option>
            <?php
            $resultado = Sala::listaPrincipal( );
            foreach($resultado as $chave => $valor){
            ?>
                <option value="<?php echo $valor->getIdSala(); ?>"><?php echo $valor->getNome(); ?></option>
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
            ?>
                <option value="<?php echo $i; ?>"><?php echo $horaInicio; ?> - <?php echo $horaFim; ?></option>
            <?php
            }
            ?>
            </select>
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