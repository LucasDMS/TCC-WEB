<?php

    session_start();

    $_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms";

    if( isset($_SESSION['logado'])){

        require_once("view/home.php");
    }
    else{
        
    }
?>