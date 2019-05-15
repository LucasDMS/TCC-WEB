<?php 
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" ."/controller/controllerCompras.php");
    $controller = new ControllerCompras();
    $rs = $controller->buscarCompras();
?>

<div class="pagina_titulo">
    Produtos
    <button class="menu_novo" type="menu" onclick="chamarViewParaApp('carrinho')"><!-- colocar onclick da nav -->
        <i class="fas fa-shopping-cart"></i>
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
                <?php echo $result->getPreco().',00'; ?><br>
                <p>fardo c/12 unidade</p>
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
                    onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="compras"
                    data-url="router.php?controller=compras&modo=inserir"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo= <?php echo $_SESSION['id']?>>
                    <i class="fas fa-cart-plus"></i>
                </a>
            </div>
        </div>
    <?php } ?>
</div>