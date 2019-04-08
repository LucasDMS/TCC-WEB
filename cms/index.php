<?php

    session_start();

    $_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms";


        require_once("view/home.php");

?>