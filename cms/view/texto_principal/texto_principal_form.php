<?php 

$action = "router.php?controller=textoprincipal&modo=inserir";
$titulo = null;
$texto = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerTextoPrincipal.php");

    $Controller = new ControllerTextoPrincipal();
    $TextoPrincipal = $Controller->buscarTextoPrincipalPorId($id);

    $action = "router.php?controller=textoprincipal&modo=atualizar";
    $modo = "atualizar";
    $id = $TextoPrincipal->getId();
    $titulo = $TextoPrincipal->getTitulo();
    $texto = $TextoPrincipal->getTexto();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar texto principal" : $paginaTitulo = "Novo texto principal";

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

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txtTitulo">Título</label>
        <input type="text" name="txtTitulo" id="txtTitulo" value="<?php echo $titulo ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtTexto">Conteúdo da notícia</label>
        <textarea name="txtTexto" id="txtTexto" required><?php echo $texto?></textarea>
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