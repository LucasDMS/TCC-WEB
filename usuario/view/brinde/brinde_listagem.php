<?php

/*
    Projeto: MVC página de listagem dos brindes.
    Autor: Kelvin
    Data Criação: 09/05/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem dos brindes.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/controller/controllerBrinde.php");

$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/model/Sessao.php";

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/db/ConexaoMysql.php");

require_once($_SESSION['PATH']);
$verificar = array();
$id = $_SESSION['id'];

$conex = new conexaoMysql();
$con = $conex->connectDatabase();

$controleller = new controllerBrinde();
$rs = $controller->buscarBrindes();

?>

<div class="pagina_titulo">
        Brindes
</div>

<div class="card_wrapper">
        <!-- CARD -->
        <?php foreach ($rs as $result) { ?>
            <div>
                Nome do Brinde:
                <?php echo $result->getNome(); ?>
            </div>
            <div>
                Texto do Brinde:
                <?php echo $result->getTexto(); ?>
            </div>

            <div class="card_operadores">
                <?php
                    $sql = "select * from tbl_brinde where apagado = 0 and ativo = 1";
                    $stm = $con->prepare($sql);
                    $sucess = $stm->execute();    
                    foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                        array_push($verificar, $result['id_brinde']);
                    }
                    
                ?>
            </div>
        </div>
    <?php } ?>
</div>