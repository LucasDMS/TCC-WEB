<?php

/*
    Projeto: MVC página de listagem dos brindes.
    Autor: Kelvin
    Data Criação: 09/05/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem dos brindes.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/usuario". "/controller/controllerBrinde.php");

$controller = new controllerBrinde();
$rs = $controller->buscarBrindes();

?>

<div class="pagina_titulo">
        Brindes
        <button class="menu_novo" type="menu" onclick="chamarViewParaApp('carrinho')"><!-- colocar onclick da nav -->
            <i class="fas fa-shopping-cart"></i>
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
                    data-pagina="brinde"
                    data-url="view/brinde/brinde_form.php?id=<?php echo $result->getId()?>"
                    data-id="<?php echo $result->getId();?>">
                    <i class="fas fa-search"></i>
                </a>
                <a class="carrinho_compra"
                    onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="brinde"
                    data-url="router.php?controller=brinde&modo=inserir"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo= <?php echo $_SESSION['id']?>>
                    <i class="fas fa-cart-plus"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>