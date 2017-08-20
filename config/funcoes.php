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

function printR($dado){
	echo "<pre>";
	print_r($dado);
	echo "</pre>";
}

//FUNÇÕES URL
// Pegar as url amigavel 
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

//URL AMIGÁVEL
function mostrapaginas() {
	$gets = getUrlAmigavel();
	if(isset($gets[0]) and $gets[0] != ''){
		if(file_exists("telas/".$gets[0]) and $gets[0] != ''){
			if(isset($gets[2])){
				if(file_exists("telas/".$gets[0]."/".$gets[1]."/".$gets[2].".php")){
					require_once ("telas/".$gets[0]."/".$gets[1]."/".$gets[2].".php");
				}
			} else {
				require_once ("telas/".$gets[0]."/".$gets[1]."/visualizar.php");
			}	
		}
	} else {
		require_once ("telas/capa.php");
	}
}

?>