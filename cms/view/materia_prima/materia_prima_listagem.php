<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 01/05/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de listagem
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" ."/controller/controllerMateriaPrima.php");
    $controller = new ControllerMateriaPrima();
    $rs = $controller->listarMateriaPrima();


?>

<div class="pagina_titulo">
    Materia Prima
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('materia_prima')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                <strong>Nome :</strong>
                <?php echo $result->getNome(); ?>
            </div>
            <div>
                <strong>Descrição : </strong>
                <?php echo $result->getDescricao(); ?>
            </div>
            <div>
                <strong>Tipo Materia : </strong>
                <?php echo $result->getTipoMateria(); ?>
            </div>
            <div>
                <strong>Validade :</strong> 
                <?php echo $result->getDataValidade(); ?>
            </div>
            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="materia_prima"
                    data-url="view/materia_prima/materia_prima_form.php?id=<?php echo $result->getId();?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>
                
                <a  onclick="asyncApagar(this)"
                    href="#"
                    data-pagina="materia_prima"
                    data-url="router.php?controller=materia_prima&modo=excluir"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>