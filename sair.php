<?php
include_once('config/funcoes.php');
session_name('adm' . SESSAOADM);
session_start();
session_destroy();
session_unset();
header("Location: " . URL);
?>