<?php 
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" ."/controller/controllerCompras.php");
    $controller = new ControllerCompras();
    $rs = $controller->buscarCompras();
?>

<div class="pagina_titulo">
    Produtos
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('compras')"><!-- colocar onclick da nav -->
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                <strong>Nome:</strong> 
                <?php echo $result->getNome(); ?>
            </div>
            <div>
                <img class="card_imagem" src='../cms/<?php echo $result->getImagem();?>'>
            </div>
            <div>
                <strong>R$ </strong> 
                <?php echo $result->getPreco().',00'; ?>
            </div>

          

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="compras"
                    data-url="view/compras/compras_form.php?id=<?php echo $result->getId()?>"
                    data-id="<?php echo $result->getId();?>">
                    <i class="fas fa-pen"></i>
                </a>
                <a class="carrinho_compra"
                    onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="compras"
                    data-url="view/compras/compras_form.php?id=<?php echo $result->getId()?>&idEstabelecimento=<?php $_SESSION['id']?>"
                    data-id="<?php echo $result->getId();?>">
                    <i class="fas fa-cart-plus"></i>
                </a>
            </div>
        </div>
    <?php } ?>
</div>