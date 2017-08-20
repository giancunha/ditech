<?php
class Usuario{

	private $idUsuario;
	private $email;
	private $senha;
	private $nome;
    
    //contrutor vazio
	public function __construct(){}

    //MÉTODOS

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