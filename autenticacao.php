<?php

session_start();

$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms";
$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/model/Sessao.php";

require_once($_SESSION['PATH']);

if ( isset($_SESSION['logado']) ) {
	$Sessao = new Sessao();

	switch($_SESSION['tipo']){
		case "ROOT":
			header("Location: cms/index.php");
		break;
		case "ADM":
			header("Location: cms/index.php");
			break;
		
		case "USUARIO":
			header("Location: usuario/index.php");
			break;
		case "EMPRESA":
			header("Location: empresa/index.php");
			break;
		default:
			echo "INVALIDO";
			break;
	}
}

?>