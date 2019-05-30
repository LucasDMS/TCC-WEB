<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerNoticia.php");

$controller = new ControllerNoticia();
$rs = $controller->buscarNoticias();

?>

<div class="pagina_titulo">
    Notícias

    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('noticias')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div class="card-desc">
                <div class="card-titulo"><?php echo utf8_encode($result->getTitulo()); ?></div>
                <div class="card-content"><?php echo utf8_encode($result->getConteudo()); ?></div>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="noticias"
                    data-url="view/noticias/noticias_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="noticias"
                    data-url="router.php?controller=noticias&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)" 
                    href="#"
                    data-pagina="noticias"
                    data-url="router.php?controller=noticias&modo=excluir" 
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>