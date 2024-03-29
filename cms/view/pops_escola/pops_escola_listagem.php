<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerPopsEscola.php");
    $controller = new ControllerPopsEscola();
    $rs = $controller->buscarPopsEscola();
?>

<div class="pagina_titulo">
    POP's na Escola
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('pops_escola')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div class="card-desc">
                <div class="card-titulo"><?php echo utf8_encode($result->getNome()); ?></div>
                <div class="card-content"><?php echo utf8_encode($result->getDescricao()); ?></div>
                <div>
                    <img class="card_imagem" src="<?php echo $result->getImagem(); ?>"/>
                </div>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="pops_escola"
                    data-url="view/pops_escola/pops_escola_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="pops_escola"
                    data-url="router.php?controller=pops_escola&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getStatus(); ?>">

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)" 
                    href="#"
                    data-pagina="pops_escola"
                    data-url="router.php?controller=pops_escola&modo=excluir" 
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>