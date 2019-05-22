<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 09/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: listagem de news_letter
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerNewsLetter.php");
    $controller = new ControllerNewsLetter();
    $rs = $controller->listarNewsLetter();
   

?>

<div class="pagina_titulo">
    Newsletter
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Email : 
                <?php echo utf8_encode ($result->getNewLetter())?>
            </div>

        </div>
    <?php } ?>
</div>