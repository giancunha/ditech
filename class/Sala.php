<?php
class Sala{

	private $idSala;
	private $nome;
	private $descricao;
    
    //contrutor vazio
	public function __construct(){}

    //MÉTODOS
	public function altera(){
		$altera = "UPDATE Sala SET
						nome = ?,
						descricao = ?
					WHERE idSala = ?
				  ";
		$bd = new BdSQL;
		// monta o array de dados a serem inseridos
		$dados = array(
					array('1' => $this->nome,
						  '2' => $this->descricao,
						  '3' => $this->idSala
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
		$insere = "INSERT INTO Sala (
				nome,
				descricao
			)  VALUES (
				?,
				?
			)
		";
		$bd = new BdSQL;
		// monta o array de dados a serem inseridos
		$dados = array(
					array('1' => $this->nome,
						  '2' => $this->descricao
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
		$consulta = "
			SELECT * 
			  FROM Sala 
		  ORDER BY nome
		";
		$resultSet = $bd->consulta( $consulta );
		$resultado = array();
		$i = 0;
		$totalResultados = count($resultSet);
		for( $j=0; $j<$totalResultados; $j++ ){
			$objeto = new Sala;
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
					    FROM Sala
					   WHERE idSala = " . $this->idSala;
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

	public function selecionaSala(){
		$bd = new BdSQL;
		$seleciona = "SELECT idSala
					    FROM Sala
					   WHERE nome = '" . $this->nome . "'";
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
	public function getIdSala(){
		return $this->idSala;
	}

	public function setIdSala($idSala){
		$this->idSala = $idSala;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getDescricao(){
		return $this->descricao;
	}	

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}	

}
?>