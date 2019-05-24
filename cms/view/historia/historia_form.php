<?php 
$texto = null;
$action = "router.php?controller=historia&modo=inserir";
$modo = "inserir";
$id = "";
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerHistoria.php");
    $Controller = new ControllerHistoria();
    $Historia = $Controller->buscarHistoriaPorId($id);
    $action = "router.php?controller=historia&modo=atualizar";
    $modo = "atualizar";
    $texto = $Historia->getTexto();
    $id = $Historia->getId();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar história" : $paginaTitulo = "Nova história";

?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_historia" 
        data-id="<?php echo $id ?>"
        enctype='multipart/form-data' 
        name="frm_historia"
        data-pagina="historia"
        data-modo="<?php echo $modo?>"
        class="form_padrao">

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txtTexto">Texto</label>
        <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?></textarea>
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