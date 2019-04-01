<?php 

$action = "router.php?controller=historia&modo=inserir";

if(isset($_GET['id'])){
    
    $id = $_GET['id'];

    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerHistoria.php");

    $Controller = new ControllerHistoria();
    $Historia = $Controller->buscarHistoriaPorId($id);

    var_dump($Historia);
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
        class="form_padrao">

    <textarea name="txt_texto" id="txt_texto" required></textarea>

    <button class="btn">
        Enviar
    </button>
</form>