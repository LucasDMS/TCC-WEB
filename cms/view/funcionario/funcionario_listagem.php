<?php 
 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" ."/controller/controllerFuncionario.php");
    $controller = new ControllerFuncionario();
    $rs = $controller->buscarFuncionario();
    
?>

<div class="pagina_titulo">
    Funcionarios
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('funcionario')">
        <i class="fas fa-plus"></i>
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
                Cargo : 
                <?php echo $result->getCargo(); ?>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="funcionario"
                    data-url="view/funcionario/funcionario_form.php?id=<?php echo $result->getId()?>&idAutenticacao=<?php echo $result->getIdAutenticacao()?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="funcionario"
                    data-url="router.php?controller=funcionario&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getAtivo();?>>

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>