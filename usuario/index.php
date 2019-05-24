<?php
    session_start();
    $_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/cms";

    $_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/cms/model/Sessao.php";

    require_once($_SESSION['PATH']);
    if( isset($_SESSION['logado'])){
        $Sessao = new Sessao();
        if($_SESSION['tipo'] == "USUARIO"){
            require_once("view/home.php");
        }
    }
    else{
        
    }
?>