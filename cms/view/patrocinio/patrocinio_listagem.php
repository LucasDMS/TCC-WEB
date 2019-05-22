<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPatrocinio.php");
$controller = new ControllerPatrocinio();
$rs = $controller->buscarPatrocinio();
?>

<div class="pagina_titulo">
    Patrocínio
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('patrocinio')">
        <i class="fas fa-plus"></i>
    </button>
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
                <p style= "
  max-width: 15ch;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
">
                Descrição : 
                <?php echo utf8_encode ($result->getDescricao()); ?>
                </p>
            </div>
            <div>
                <img class="card_imagem" src="<?php echo $result->getImagem(); ?>"/>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="patrocinio"
                    data-url="view/patrocinio/patrocinio_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="patrocinio"
                    data-url="router.php?controller=patrocinio&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getStatus(); ?>">

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)" 
                    href="#"
                    data-pagina="patrocinio"
                    data-url="router.php?controller=patrocinio&modo=excluir" 
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>