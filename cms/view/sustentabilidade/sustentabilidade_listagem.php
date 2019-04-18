<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerSustentabilidade.php");

$controller = new ControllerSustentabilidade();
$rs = $controller->buscarSustentabilidades();

?>

<div class="pagina_titulo">
    Sustentabilidade

    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('sustentabilidade')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Texto : 
                <?php echo $result->getTexto(); ?>
            </div>
            <div>
                <img class="card_imagem" src="<?php echo $result->getImagem(); ?>"/>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="sustentabilidade"
                    data-url="view/sustentabilidade/sustentabilidade_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)" 
                    href="#"
                    data-pagina="sustentabilidade"
                    data-url="router.php?controller=sustentabilidade&modo=ativar" 
                    data-id="<?php echo $result->getId(); ?>"
                    data-ativo="<?php echo $result->getAtivo(); ?>">

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)" 
                    href="#"
                    data-pagina="sustentabilidade"
                    data-url="router.php?controller=sustentabilidade&modo=excluir" 
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>