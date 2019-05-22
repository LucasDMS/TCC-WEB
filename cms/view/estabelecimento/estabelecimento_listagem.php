<?php

/* 
    Projeto: MVC página de listagem do Estabelecimento.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem do Estabelecimento.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/controller/controllerEstabelecimento.php");

$controller = new controllerEstabelecimento();
$rs = $controller->buscarEstabelecimento();

?>

<div class="pagina_titulo">
    Estabelecimentos Parceiros
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Nome : 
                <?php echo utf8_encode ($result->getNome()); ?>
            </div>
            <div>
                Texto : 
                <?php echo utf8_encode ($result->getTexto()); ?>
            </div>

            <div class="card_operadores">
                <a onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="estabelecimento"
                    data-url="router.php?controller=estabelecimento&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>   
            </div>

        </div>
    <?php } ?>
</div>

