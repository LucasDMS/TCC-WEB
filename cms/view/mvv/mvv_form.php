<?php 

$action = "router.php?controller=mvv&modo=inserir";
$texto = null;
$paragrafo = null;
$tipoTexto = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerMVV.php");

    $Controller = new ControllerMVV();
    $MVV = $Controller->buscarMVVPorId($id);

    $action = "router.php?controller=mvv&modo=atualizar";
    $modo = "atualizar";
    $id = $MVV->getId();
    $texto = $MVV->getTexto();
    $tipoTexto = $MVV->getTipoTexto();
    $paragrafo= $MVV->getParagrafo();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar notícia" : $paginaTitulo = "Nova notícia";

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
    
    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txtTexto">Texto</label>
        <textarea name="txtTexto" id="txtTexto" required><?php echo $texto?></textarea>
    </div>

    <div class="inputDados">
        <label from="txtTipoTexto">Tipo</label>
        <input type="text" name="txtTipoTexto" id="txtTipoTexto" value="<?php echo $tipoTexto?>" required>
    </div>

    <div class="inputDados">
        <label from="txtParagrafo">Paragrafo</label>
        <input type="text" name="txtParagrafo" id="txtParagrafo" value="<?php echo $paragrafo?>" required>
    </div>

    <div class="flex flex-center">
        <button type="reset" class="btn btn-clear">
            <i class="fas fa-eraser"></i>
        </button>

        <button class="btn btn-submit">
            <i class="fas fa-save"></i>
        </button>
    </div>

</form>