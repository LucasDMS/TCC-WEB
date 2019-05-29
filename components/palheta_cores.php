<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerCores.php");

    $controller = new ControllerCores();
    $rs = $controller->buscarCores();
?>
<style>
    /* PALHETA DE CORES DO SITE */
    /* COR DE BACKGROUND */
    /*Header*/
    .cor_fundo_1{background-color: <?php echo $rs[0]->getCores() ?>}
    /*menu*/
    .cor_fundo_2{background-color: <?php echo $rs[1]->getCores() ?>}
    .cor_fundo_3{background-color: #ffdd00}
    .cor_fundo_4{background-color: #15a650}
    .cor_fundo_5{background-color: #09a552}
    .cor_fundo_6{background-color: <?php echo $rs[2]->getCores() ?>}
    .cor_fundo_7{background-color: <?php echo $rs[3]->getCores() ?>}
    /* COR DE LETRA */
    .cor_letra_1{color: #09a552;}
    .cor_letra_2{color: #ffdd00;}
    .cor_letra_3{color: #e70c2c;}
    .cor_letra_4{color: #ffffff;}
    .cor_letra_5{color: #1c1c1d;}
</style>