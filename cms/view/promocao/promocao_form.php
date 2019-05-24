<?php 

$action = "router.php?controller=promocao&modo=inserir";
$nome = null;
$imagem = null;
$dataInicio = null;
$dataFinal = null;
$tipoTexto = null;
$texto = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerPromocao.php");

    $Controller = new ControllerPromocao();
    $Promocao = $Controller->buscarPromocaoPorId($id);

    $action = "router.php?controller=promocao&modo=atualizar";
    $modo = "atualizar";
    $id = $Promocao->getId();
    $nome = $Promocao->getNome();
    $dataInicio = $Promocao->getDataInicio();
    $dataFinal = $Promocao->getDataFinal();
    $tipoTexto = $Promocao->getTipoTexto();
    $texto = $Promocao->getTexto();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar promoção" : $paginaTitulo = "Nova promoção";

?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_promocao" 
        enctype='multipart/form-data' 
        name="frm_promocao" 
        class="form_padrao"
        data-id="<?php echo $id?>"
        data-modo="<?php echo $modo?>"
        data-pagina="promocao">

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txtNome">Título da promoção</label>
        <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtDataInicio">Data de início</label>
        <input type="date" name="txtDataInicio" id="txtDataInicio" value="<?php echo $dataInicio ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtDataFinal">Data de termino</label>
        <input type="date" name="txtDataFinal" id="txtDataFinal" value="<?php echo $dataFinal ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtTexto">Texto</label>
        <input type="text" name="txtTexto" id="txtTexto" value="<?php echo $texto ?>" required>
    </div>

    <input type="file" name="img" id="img"/>

    <div class="flex flex-center">
        <button type="reset" class="btn btn-clear">
            <i class="fas fa-eraser"></i>
        </button>

        <button class="btn btn-submit">
            <i class="fas fa-save"></i>
        </button>
    </div>

</form>