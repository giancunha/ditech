<?php
 session_name('adm'.SESSAOADM);
 session_cache_limiter('public, must-revalidate');
 @session_start();

function logado(){
	if(isset($_SESSION['usuario_adm_'.SESSAOADM]) and !empty($_SESSION['usuario_adm_'.SESSAOADM])){
		return true;
	}else{
		return false;
	}
}
?>