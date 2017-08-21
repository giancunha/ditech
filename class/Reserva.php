<?php
class Reserva{
	private $idReserva;
	private $idUsuario;
	private $idSala;
	private $horaInicio;
	private $horaFim;
	private $descricao;
	
    //contrutor vazio
	public function __construct(){}

    //MÉTODOS
	public function altera(){
		$altera = "UPDATE Reserva SET
						idSala = ?,
						horaInicio = ?,
						horaFim = ?,
						descricao = ?
					WHERE idReserva = ?
				  ";
		$bd = new BdSQL;
		// monta o array de dados a serem inseridos
		$dados = array(
					array('1' => $this->idSala,
						  '2' => $this->horaInicio,
						  '3' => $this->horaFim,
						  '4' => $this->descricao,
						  '5' => $this->idReserva
						  )
				);
		$result = $bd->altera($altera, $dados); // executa a atualização
		if($result=='ok'){
			return true;
		}else{
			return false;
		}		
	}

	public function insere(){
		$insere = "INSERT INTO Reserva (
				idUsuario,
				idSala,
				horaInicio,
				horaFim,
				descricao
			)  VALUES (
				?,?,?,?,?
			)
		";
		$bd = new BdSQL;
		// monta o array de dados a serem inseridos
		$dados = array(
					array('1' => $this->idUsuario,
						  '2' => $this->idSala,
						  '3' => $this->horaInicio,
						  '4' => $this->horaFim,
						  '5' => $this->descricao
						  )
				);
		$result = $bd->insereRetornaId($insere, $dados); // executa a inserção
		if($result > 0){
			return $result;
		}else{
			return false;
		}		
	}

	public static function listaPrincipal( ){
		$bd = new BdSQL;
		$consulta = "SELECT * 
			  		  FROM Reserva
				  ORDER BY horaInicio
		";
		$resultSet = $bd->consulta( $consulta );
		$resultado = array();
		$i = 0;
		$totalResultados = count($resultSet);
		for( $j=0; $j<$totalResultados; $j++ ){
			$objeto = new Reserva;
			foreach($resultSet[$j] as $chave=>$valor){		
				if(!is_int($chave)){
					$set = "set".ucfirst( $chave );
					$objeto->$set( $valor );
				}
			}
			$resultado[$i] = $objeto;
			$i++;
		}
		return $resultado;
	}

	public static function listaPorHora( $hora, $idSala, $data ){
		$bd = new BdSQL;
		$consulta = "SELECT * 
			  		  FROM Reserva
					 WHERE idSala = '$idSala'
					   AND horaInicio = '$data $hora:00'
				  ORDER BY horaInicio
		";
		$resultSet = $bd->consulta( $consulta );
		$resultado = array();
		$i = 0;
		$totalResultados = count($resultSet);
		for( $j=0; $j<$totalResultados; $j++ ){
			$objeto = new Reserva;
			foreach($resultSet[$j] as $chave=>$valor){		
				if(!is_int($chave)){
					$set = "set".ucfirst( $chave );
					$objeto->$set( $valor );
				}
			}
			$resultado[$i] = $objeto;
			$i++;
		}
		return $resultado;
	}

	public function seleciona(){
		$bd = new BdSQL;
		$seleciona = "SELECT *
					    FROM Reserva
					   WHERE idReserva = " . $this->idReserva;
		$resultado = $bd->consulta($seleciona);
		if(count($resultado)==1){
			foreach( $resultado[0] as $chave=>$valor ){
				if(!is_int($chave)){
					$this->$chave = $valor;
				}
			}
			return true;
		}else{
			return false;
		}
	}

	public function selecionaPorUsuario( $idReserva = NULL ){
		if(isset($idReserva)){
			$idReserva = "AND idReserva != '$this->idReserva'";
		}
		$bd = new BdSQL;
		$seleciona = "SELECT *
					    FROM Reserva
					   WHERE idUsuario = '$this->idUsuario'
					     AND horaInicio = '$this->horaInicio'";
		$resultado = $bd->consulta($seleciona);
		if(count($resultado)==1){
			foreach( $resultado[0] as $chave=>$valor ){
				if(!is_int($chave)){
					$this->$chave = $valor;
				}
			}
			return true;
		}else{
			return false;
		}
	}

	//GETTERS E SETTERS
	public function getIdReserva(){
		return $this->idReserva;
	}

	public function setIdReserva($idReserva){
		$this->idReserva = $idReserva;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getIdSala(){
		return $this->idSala;
	}

	public function setIdSala($idSala){
		$this->idSala = $idSala;
	}

	public function getHoraInicio(){
		return $this->horaInicio;
	}

	public function setHoraInicio($horaInicio){
		$this->horaInicio = $horaInicio;
	}

	public function getHoraFim(){
		return $this->horaFim;
	}

	public function setHoraFim($horaFim){
		$this->horaFim = $horaFim;
	}

	public function getDescricao(){
		return $this->descricao;
	}	

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}	

}
?>