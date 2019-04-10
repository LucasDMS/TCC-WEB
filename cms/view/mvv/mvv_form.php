<?php 

$action = "router.php?controller=mvv&modo=inserir";
$texto = null;
$paragrafo = null;
$tipoTexto = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerMVV.php");

    $Controller = new ControllerMVV();
    $MVV = $Controller->buscarMVVPorId($id);

    $action = "router.php?controller=mvv&modo=atualizar";
    $modo = "atualizar";
    $id = $MVV->getId();
    $texto = $MVV->getTexto();
    $tipoTexto = $MVV->getTipoTexto();
    $paragrafo= $MVV->getParagrafo();
}

?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_mvv" 
        enctype='multipart/form-data' 
        name="frm_mvv" 
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo?>"
        data-pagina="mvv">

    <input type="text" name="txtTexto" id="txtTexto" value="<?php echo $texto?>" required>
    <input type="text" name="txtTipoTexto" id="txtTipoTexto" value="<?php echo $tipoTexto?>" required>
    <input type="text" name="txtParagrafo" id="txtParagrafo" value="<?php echo $paragrafo?>" required>

    <button class="btn">
        Enviar
    </button>
</form>