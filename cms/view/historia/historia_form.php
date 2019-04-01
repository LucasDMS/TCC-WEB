<?php 

$texto = null;

$action = "router.php?controller=historia&modo=inserir";
$modo = "inserir";

if(isset($_GET['id'])){
    
    $id = $_GET['id'];

    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerHistoria.php");

    $Controller = new ControllerHistoria();
    $Historia = $Controller->buscarHistoriaPorId($id);

    $action = "router.php?controller=historia&modo=atualizar";
    $modo = "atualizar";
    $texto = $Historia->getTexto();
}

?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_historia" 
        enctype='multipart/form-data' 
        name="frm_historia"
        data-pagina="historia"
        data-modo="<?php echo $modo?>"
        class="form_padrao">

    <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?></textarea>

    <button class="btn">
        Enviar
    </button>
</form>