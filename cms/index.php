<?php
    session_start();
    $_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms";

    $_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/model/Sessao.php";
    require_once("model/Sessao.php");
    if( isset($_SESSION['logado'])){
        $Sessao = new Sessao();
        if($_SESSION['tipo'] == "ADM"){
            require_once("view/home.php");
        }
    }
    else{
        
    }
?>