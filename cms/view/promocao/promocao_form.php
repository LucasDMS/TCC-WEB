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
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPromocao.php");

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

    <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome?>" required>
    <input type="date" name="txtDataInicio" id="txtDataInicio" value="<?php echo $dataInicio?>" required>
    <input type="date" name="txtDataFinal" id="txtDataFinal" value="<?php echo $dataFinal?>" required>
    <input type="text" name="txtTexto" id="txtTexto" value="<?php echo $texto?>" required>
    <input type="text" name="txtTipoTexto" id="txtTipoTexto" value="<?php echo $tipoTexto?>" required>
    <input type="file" name="img" id="img"/>

    <button class="btn">
        Enviar
    </button>
</form>