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
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('news_letter')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Nome : 
                <?php echo $result->getNew_letter()?>
            </div>
            
            <div class="card_operadores">

                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="patrocinio"
                    data-url="router.php?controller=patrocinio&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getStatus(); ?>">

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>