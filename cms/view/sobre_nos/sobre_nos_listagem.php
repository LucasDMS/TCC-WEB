<?php 

/* 
    Projeto: MVC página de listagem do Sobre_Nos.
    Autor: Kelvin
    Data Criação: 08/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem do Sobre_Nos.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/tcc/cms" . "/controller/controllerSobreNos.php");

$controller = new controllerSobreNos();
$rs = $controller->buscarSobreNos();

?>

<div class="pagina_titulo">
    Sobre Nós
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('sobre_nos')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div class="card-desc">
                <div class="card-titulo"><?php echo utf8_encode($result->getTitulo());?></div>
                <div class="card-content"><?php echo utf8_encode($result->getTexto());?></div>
                <div class="card-content">
                    Ordem : 
                    <?php echo $result->getOrdem();?>
                </div>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="sobre_nos"
                    data-url="view/sobre_nos/sobre_nos_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>
                
                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="sobre_nos"
                    data-url="router.php?controller=sobre_nos&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)" 
                    href="#"
                    data-pagina="sobre_nos"
                    data-url="router.php?controller=sobre_nos&modo=excluir" 
                    data-id="<?php echo $result->getId(); ?>">
                    <i class="fas fa-trash"></i>
                </a>  
            </div>

        </div>
    <?php } ?>
</div>
