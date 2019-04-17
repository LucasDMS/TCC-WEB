<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerProdutos.php");

$controller = new ControllerProdutos();
$rs = $controller->buscarProdutos();

?>

<div class="pagina_titulo">
    Produtos

    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('produto')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Nome : 
                <?php echo $result->getNome(); ?>
            </div>
            <div>
                Descrição : 
                <?php echo $result->getDescricao(); ?>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="produto"
                    data-url="router.php?controller=produtos&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>
