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

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/controller/controllerBrinde.php");

$controller = new controllerBrinde();
$rs = $controller->buscarBrindes();

?>

<div class="pagina_titulo">
        Brindes
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
                    data-url="view/brinde/brinde_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="brinde"
                    data-url="router.php?controller=brinde&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)" 
                    href="#"
                    data-pagina="brinde"
                    data-url="router.php?controller=brinde&modo=excluir" 
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>