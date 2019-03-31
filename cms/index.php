<?php

    session_start();

    if( isset($_SESSION['logado'])){

        require_once("view/home.php");
    }
    else{
        
    }
?>