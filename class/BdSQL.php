<?php
//class/BdSQL.php - controle do banco de dados
class BdSQL{
	private $tipoBanco	= 'mysql';
	private $host		= HOST;
	private $porta		= '3306';
	private $nomeBanco	= NOMEBANCO;
	private $userBanco	= USERBANCO;
	private $passBanco	= SENHABD;

	//abre a conexão com o banco utilizando PDO 
	public function conecta(){
		try {
			$bd = new PDO( 
				$this->tipoBanco.':host='.$this->host.';port='.$this->porta.';dbname='.$this->nomeBanco, 
				$this->userBanco, 
				$this->passBanco,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
			return $bd;
		}catch(PDOException $e){
			//printR($e->getMessage());
			echo "ERRO ao conectar ao banco<br>".$e->getMessage(); die();
		}
	}

	//executa a consulta informada no parâmetro $query
	public function consulta( $query ){
		try {
			$banco = $this->conecta();

			$resultado = $banco->prepare($query);
			if(!$resultado->execute()){
				$erro = $resultado->errorInfo();
				if($erro[2]){
					printR($erro[2]);
					throw new Exception("Erro ao efetuar consulta" . $erro[2]);
				}
			}
	
			$linhas = $resultado->fetchAll();
			return $linhas;
		}catch(Exception $e){
			exibeAlerta($erro[2], 'voltar');
			return $e->getMessage();
			die();
		}
		$banco = null;
	}
	
    //GETTERS AND SETTERS
	public function getTipoBanco(){
		return $this->tipoBanco;
	}

	public function setTipoBanco($tipoBanco){
		$this->tipoBanco = $tipoBanco;
	}

	public function getHost(){
		return $this->host;
	}

	public function setHost($host){
		$this->host = $host;
	}

	public function getPorta(){
		return $this->porta;
	}

	public function setPorta($porta){
		$this->porta = $porta;
	}

	public function getNomeBanco(){
		return $this->nomeBanco;
	}

	public function setNomeBanco($nomeBanco){
		$this->nomeBanco = $nomeBanco;
	}

	public function getUserBanco(){
		return $this->userBanco;
	}

	public function setUserBanco($userBanco){
		$this->userBanco = $userBanco;
	}

	public function getPassBanco(){
		return $this->passBanco;
	}

	public function setPassBanco($passBanco){
		$this->passBanco = $passBanco;
	}
}
?>