<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerProduto.php");

$controller = new ControllerProduto();
$rs = $controller->buscarProduto();

?>

<div class="pagina_titulo">
    Produto
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
                <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="produto"
                        data-url="view/produto/produto_form.php?id=<?php echo $result->getId()?>&idNutricional=<?php echo $result->getIdNutricional()?>"
                        data-id="<?php echo $result->getId();?>">

                        <i class="fas fa-pen"></i>
                    </a>

                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="produto"
                        data-url="router.php?controller=produto&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">
                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>

                    <a  onclick="asyncApagar(this)" 
                        href="#"
                        data-pagina="produto"
                        data-url="router.php?controller=produto&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-trash"></i>
                    </a>
            </div>

        </div>
    <?php } ?>
</div>
