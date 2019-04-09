<?php 

$action = "router.php?controller=textoprincipal&modo=inserir";
$titulo = null;
$texto = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerTextoPrincipal.php");

    $Controller = new ControllerTextoPrincipal();
    $TextoPrincipal = $Controller->buscarTextoPrincipalPorId($id);

    $action = "router.php?controller=textoprincipal&modo=atualizar";
    $modo = "atualizar";
    $id = $TextoPrincipal->getId();
    $titulo = $TextoPrincipal->getTitulo();
    $texto = $TextoPrincipal->getTexto();

}

?>
<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_textoPrincipal" 
        enctype='multipart/form-data' 
        name="frm_textoPrincipal" 
        class="form_padrao"
        data-id="<?php echo $id?>"
        data-modo="<?php echo $modo?>"
        data-pagina="texto_principal">
    <input type="text" name="txtTitulo" id="txtTitulo" value="<?php echo $titulo?>" required>
    <input type="text" name="txtTexto" id="txtTexto" value="<?php echo $texto?>" required>


    <button class="btn">
        Enviar
    </button>
</form>