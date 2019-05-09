<?php

/* 
    Projeto: MVC página de listagem da Promoção.
    Autor: Anderson
    Data Criação: 08/05/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem da promocao.
*/

$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms";
	
$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/model/Sessao.php";
$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/dao/SessaoDAO.php";

require_once($_SESSION['PATH']);
$id = $_SESSION['id '];

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/controller/controllerPromocao.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/db/ConexaoMysql.php");		

$verificar = array();

$conex = new conexaoMysql();
$con = $conex->connectDatabase();

$controller = new controllerPromocao();
$rs = $controller->buscarPromocoes();
$rsUser = $controller->buscarPromocaoUsuario();

?>

<div class="pagina_titulo">
    Promoções
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php 
    // if (!$rsUser->count())
    // {
    //    foreach($rsUser as $result){
    //        echo($result->getId());
    //    }
    // }
    foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Nome : 
                <?php echo $result->getNome(); ?>
            </div>
            <div>
                Texto : 
                <?php echo $result->getTexto(); ?>
            </div>

            <div class="card_operadores">
                <?php
                    foreach ($rsUser as $result){	
                        array_push($verificar, $result->getIdUsuario());
                    }
                    if(in_array($id, $verificar)){
				?>
				<a
                    onclick="asyncSubmit(this)"
                    href="#"
                    data-pagina="promocao"
                    data-url="router.php?controller=promocao&modo=participar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo="<?php echo $result->getAtivoUsuario(); ?>">
				Cancelar participação
				<i class="fas fa-award"></i>
                </a>
				<?php
					}else{
				?>
				<a
                    onclick="asyncParticipar(this)"
                    href="#"
                    data-pagina="promocao"
                    data-url="router.php?controller=promocao&modo=participar"
                    data-id-promocao="<?php echo $result->getId();?>"
                    data-id="<?php echo ($id); ?>">
				Quero participar!
				<i class="fas fa-award"></i></a>
				<?php
						}            
                ?>
            </div>

        </div>
    <?php } ?>
</div>