<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerCores.php");

$controller = new ControllerCores();
$rs = $controller->buscarCores();

?>

<div class="pagina_titulo">
    Cores do Site
    
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('cores')">
        <i class="fas fa-plus"></i>
    </button>
</div>


<div class="card_wrapper"> 
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
               Cores :
               <?php echo $result->getCores(); ?> 
            </div>
            <div> 
                Tipo cores :
                <?php echo $result->getTipoCores(); ?>
            </div>
            
        <div class="card_operadores">
            <a onclick="asyncBuscarDados(this)"
                href="#"
                data-pagina = "cores"
                data-url="view/cores/cores_form.php?id=<?php echo $result->getId(); ?>"
                data-id="<?php echo $result->getId(); ?>">
                
                <i class="fas fa-pen"></i>
            </a>    
        </div>
    </div>
  <?php } ?>
</div>