<?php 

$action = "router.php?controller=sustentabilidade&modo=inserir";
$texto = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerSustentabilidade.php");

    $Controller = new ControllerSustentabilidade();
    $Sustentabilidade = $Controller->buscarSustentabilidadePorId($id);

    $action = "router.php?controller=sustentabilidade&modo=atualizar";
    $modo = "atualizar";
    $id = $Sustentabilidade->getId();
    $texto = $Sustentabilidade->getTexto();

}

$modo == "atualizar" ? $paginaTitulo = "Atualizar notícia" : $paginaTitulo = "Sustentabilidade";

?>
<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_sustentabilidade" 
        enctype='multipart/form-data' 
        name="frm_sustentabilidade" 
        class="form_padrao"
        data-id="<?php echo $id?>"
        data-modo="<?php echo $modo?>"
        data-pagina="sustentabilidade">

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txtTexto">Título</label>
        <textarea name="txtTexto" id="txtTexto" required><?php echo $texto?></textarea>
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