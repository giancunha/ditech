<?php
class Usuario{

	private $idUsuario;
	private $email;
	private $senha;
	private $nome;
    
    //contrutor vazio
	public function __construct(){}

    //MÉTODOS
	public function altera(){
		$altera = "UPDATE Usuario SET
						nome = ?,
						email = ?
					WHERE idUsuario = ?
				  ";
		$bd = new BdSQL;
		// monta o array de dados a serem inseridos
		$dados = array(
					array('1' => $this->nome,
						  '2' => $this->email,
						  '3' => $this->idUsuario
						  )
				);
		$result = $bd->altera($altera, $dados); // executa a atualização
		if($result=='ok'){
			return true;
		}else{
			return false;
		}		
	}

	public function exclui(){
		$exclui = "DELETE FROM Usuario WHERE idUsuario = ?";
		$bd = new BdSQL;	
		$dados = array(
					array('1'=>$this->idUsuario)
				);
		$result = $bd->deleta($exclui, $dados);
		if($result=='ok'){
			return true;
		}else{
			return false;
		}	
	}

	public function insere(){
		$insere = "INSERT INTO Usuario (
				nome,
				email,
				senha
			)  VALUES (
				?,
				?,
				?
			)
		";
		$bd = new BdSQL;
		// monta o array de dados a serem inseridos
		$dados = array(
					array('1' => $this->nome,
						  '2' => $this->email,
						  '3' => $this->senha
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
			  FROM Usuario 
		  ORDER BY nome
		";
		$resultSet = $bd->consulta( $consulta );
		$resultado = array();
		$i = 0;
		$totalResultados = count($resultSet);
		for( $j=0; $j<$totalResultados; $j++ ){
			$objeto = new Usuario;
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

	public function login(){
		$bd = new BdSQL;
		$consultaLogin = "SELECT * FROM Usuario WHERE email ='" . $this->email . "' AND senha = '" . $this->senha . "'";
		$resultado = $bd->consulta($consultaLogin);
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

	public function seleciona(){
		$bd = new BdSQL;
		$seleciona = "SELECT *
					    FROM Usuario
					   WHERE idUsuario = " . $this->idUsuario;
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

	public function selecionaEmail(){
		$bd = new BdSQL;
		$seleciona = "SELECT *
					    FROM Usuario
					   WHERE email = '" . $this->email . "'";
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
	public function getidUsuario(){
		return $this->idUsuario;
	}

	public function setidUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getemail(){
		return $this->email;
	}

	public function setemail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = encriptaSenha($senha);
	}

	public function getnome(){
		return $this->nome;
	}

	public function setnome($nome){
		$this->nome = $nome;
	}

}
?>