<?php 

$action = "router.php?controller=sustentabilidade&modo=inserir";
$titulo = null;
$conteudo = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerSustentabilidade.php");

    $Controller = new ControllerNoticia();
    $Noticia = $Controller->buscarSustentabilidadePorId($id);

    $action = "router.php?controller=noticias&modo=atualizar";
    $modo = "atualizar";
    $id = $Noticia->getId();
    $titulo = $Noticia->getTitulo();
    $conteudo= $Noticia->getConteudo();
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
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo?>"
        data-pagina="sustentabilidade">

    <input type="text" name="txtTexto" id="txtTitulo" value="<?php echo $titulo?>" required>

    <input type="file" name="img" id="img"/>

    <button class="btn">
        Enviar
    </button>
</form>