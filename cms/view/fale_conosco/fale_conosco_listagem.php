<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerFaleConosco.php");

$controller = new ControllerFaleConosco();
$rs = $controller->buscarFaleConosco();

?>

<div class="pagina_titulo">
    Fale Conosco
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Nome : 
                <?php echo utf8_encode ($result->getNome()); ?>
            </div>
            <div>
                Email : 
                <?php echo utf8_encode ($result->getEmail()); ?>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="fale_conosco"
                    data-url="view/fale_conosco/fale_conosco_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-search"></i>
                </a>

                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="fale_conosco"
                    data-url="router.php?controller=fale_conosco&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getStatus(); ?>">

                    <?php $status = ($result->getStatus()=='1') ? "-open" : "" ; ?>
                    <i class="fas fa-envelope<?php echo $status ?>"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>