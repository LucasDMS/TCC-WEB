<?php 

$action = "router.php?controller=noticias&modo=inserir";
$titulo = null;
$conteudo = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerNoticia.php");

    $Controller = new ControllerNoticia();
    $Noticia = $Controller->buscarNoticiaPorId($id);

    $action = "router.php?controller=noticias&modo=atualizar";
    $modo = "atualizar";
    $id = $Noticia->getId();
    $titulo = $Noticia->getTitulo();
    $conteudo= $Noticia->getConteudo();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar notícia" : $paginaTitulo = "Nova notícia";

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

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txtTexto">Título</label>
        <input value="<?php echo $titulo ?>" name="txt_titulo" id="txt_titulo" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txtTexto">Conteúdo da notícia</label>
        <textarea name="txt_conteudo" id="txt_conteudo" required><?php echo $conteudo?></textarea>
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