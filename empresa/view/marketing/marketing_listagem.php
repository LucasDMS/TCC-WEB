<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerEstabelecimento.php");

$controller = new ControllerEstabelecimento();
$rs = $controller->buscarEstabelecimento();
?>

<div class="pagina_titulo">
    Marketing da empresa
</div>

<div class="card_wrapper">
    <!-- CARD -->
    
    <div class="card">
        <div>
            Descrição : 
            <?php echo utf8_encode($rs->getDescricao()); ?>
        </div>
        <div>
            <img class="card_imagem" src="<?php echo $rs->getImagem(); ?>">
        </div>
        <div class="card_operadores">
            <a  onclick="asyncBuscarDados(this)"
                href="#"
                data-pagina="marketing"
                data-url="view/marketing/marketing_form.php?id=<?php echo $rs->getId(); ?>"
                data-id="<?php echo $rs->getId(); ?>">

            <i class="fas fa-pen"></i>
            </a>
        </div>
    </div>
</div>