<?php 

$action = "router.php?controller=sustentabilidade&modo=inserir";
$titulo = null;
$conteudo = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerSustentabilidade.php");

    $Controller = new ControllerSustentabilidade();
    $Sustentabilidade = $Controller->buscarSustentabilidadePorId($id);

    $action = "router.php?controller=sustentabilidade&modo=atualizar";
    $modo = "atualizar";
    $id = $Sustentabilidade->getId();
    $texto = $Sustentabilidade->getTexto();

}

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

    <input type="text" name="txtTexto" id="txtTitulo" value="<?php echo $texto?>" required>

    <input type="file" name="img" id="img"/>

    <button class="btn">
        Enviar
    </button>
</form>