<?php 

$action = "router.php?controller=noticias&modo=inserir";
$titulo = null;
$conteudo = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerNoticia.php");

    $Controller = new ControllerNoticia();
    $Noticia = $Controller->buscarNoticiaPorId($id);

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
        id="frm_noticia" 
        enctype='multipart/form-data' 
        name="frm_noticia" 
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo?>"
        data-pagina="noticias">

    <input type="text" name="txt_titulo" id="txt_titulo" value="<?php echo $titulo?>" required>

    <textarea name="txt_conteudo" id="txt_conteudo" required><?php echo $conteudo?></textarea>

    <button class="btn">
        Enviar
    </button>
</form>