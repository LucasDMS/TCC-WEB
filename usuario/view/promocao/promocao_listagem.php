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

require_once($_SERVER['DOCUMENT_ROOT']. "/cms" . "/controller/controllerPromocao.php");

$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/cms/model/Sessao.php";

require_once($_SERVER['DOCUMENT_ROOT'] . "/cms/db/ConexaoMysql.php");		

require_once($_SESSION['PATH']);
$verificar = array();
$id = $_SESSION['id'];

$conex = new conexaoMysql();
$con = $conex->connectDatabase();

$controller = new controllerPromocao();
$rs = $controller->buscarPromocoes();

?>

<div class="pagina_titulo">
    Promoções
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
                Texto : 
                <?php echo $result->getTexto(); ?>
            </div>

            <div class="card_operadores">
                <?php
                    $sql = "select * from tbl_promocao_usuario where apagado = 0 and ativo = 1";
                    $stm = $con->prepare($sql);
                    $success = $stm->execute();
                    foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
                        array_push($verificar, $result['id_usuario']);
                    }
                    if(in_array($id, $verificar)){
				?>
				<a
                    onclick="asyncParticipar(this)"
                    href="#"
                    data-pagina="promocao"
                    data-url="router.php?controller=promocao&modo=participar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">
				Cancelar participação
				<?php
					}else{
				?>
				<a
                    onclick="asyncParticipar(this)"
                    href="#"
                    data-pagina="promocao"
                    data-url="router.php?controller=promocao&modo=participar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">
				Quero participar!
				<i class="fas fa-award"></i></a>
				<?php
						}            
                ?>
            </div>

        </div>
    <?php } ?>
</div>

