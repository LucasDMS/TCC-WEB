<?php 

/* 
    Projeto: MVC página de listagem do Produto em Destaque.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem do Produto em Destaque.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/tcc/cms" . "/controller/controllerProdutoDestaque.php");

$controller = new controllerProdutoDestaque();
$rs = $controller->buscarProdutoDestaque();

?>

<div class="pagina_titulo">
    Produto em Destaque
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div class="card-desc">
                <div class="card-titulo"><?php echo $result->getNome();?></div>
                <div class="card-content"><?php echo $result->getTexto();?></div>
            </div>
            
            <div class="card_operadores">
                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="produto_destaque"
                    data-url="router.php?controller=produto_destaque&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>  
            </div>

        </div>
    <?php } ?>
</div>