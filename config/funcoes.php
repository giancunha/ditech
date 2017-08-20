<?PHP
//CONSTANTES
define('PROTOCOLO', 'http://');
define('URL', PROTOCOLO . $_SERVER['HTTP_HOST']);
define('SESSAOADM', 'Ditech');
//dados BD
define('HOST', 'localhost');
define('NOMEBANCO', 'ditech');
define('USERBANCO', 'root');
define('SENHABD', '');

define('EMPRESA',"Ditech");

//FUNÇÕES
function encriptaSenha($senha){
    $limite = 7;
	for ($i=0; $i < $limite; $i++) { 
		$senha = md5($senha);
	}
	return $senha;
}

function exibeAlerta($recado, $redirecionamento=null){
	$alerta = '<script type="text/javascript">';
	if($recado!=''){
		$alerta .= "alert(\"".$recado."\");";
	}
	if( $redirecionamento == 'voltar'){
		$alerta .= "history.back();";
	} else if( $redirecionamento != '' and $redirecionamento != './' ){
		$alerta .= "document.location='" . $redirecionamento . "'; ";
	}else{
		$alerta .= "document.location='./'; ";
	}
	$alerta .= '</script>';
	return $alerta;
}

function exibeId($id, $numCaracteres = 5){
	return str_pad($id,$numCaracteres,'0',STR_PAD_LEFT);	
}

function printR($dado){
	echo "<pre>";
	print_r($dado);
	echo "</pre>";
}

//FUNÇÕES URL
//PEGA URL AMIGÁVEL
function getUrlAmigavel($origem = URL) {
	$actual_link = PROTOCOLO . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$actual_link = str_replace($origem."/","",$actual_link);
	$actual_link = str_replace(strrchr($actual_link, "?"), "", $actual_link);
	if($actual_link != ''){
		$gets = explode("/", $actual_link);
	} else {
		$gets = ["",""];
	}
	return $gets;
}
$gets = getUrlAmigavel();
function mostrapaginas() {
	$gets = getUrlAmigavel();
	if(isset($gets[0]) and $gets[0] != ''){
		if(file_exists("telas/".$gets[0]) and $gets[0] != ''){
			if(isset($gets[1])){
				if(file_exists("telas/".$gets[0]."/".$gets[1].".php")){
					require_once ("telas/".$gets[0]."/".$gets[1].".php");
				}
			} else {
				require_once ("telas/".$gets[0]."//capa.php");
			}	
		}
	} else {
		require_once ("telas/capa.php");
	}
}

?>