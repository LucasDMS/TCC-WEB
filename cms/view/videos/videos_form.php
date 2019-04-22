<?php
/*
    Projeto: TCC
    Autor: Nicolas
    Data Criação: 03/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: dados de Videos
*/

$action = "router.php?controller=videos&modo=inserir";
$modo = "inserir";
$titulo = null;
$link = null; 
$descricao = null; 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerVideos.php");

    $Controller = new ControllerVideos();
    $Videos = $Controller->buscarVideosPorId($id);

    $action = "router.php?controller=videos&modo=atualizar";
    $modo = "atualizar";
    $titulo = $Videos->getTitulo();
    $link = $Videos->getLink();
    $id = $Videos->getId();
    $descricao = $Videos->getDescricao();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar notícia" : $paginaTitulo = "Nova notícia";

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_videos"
        enctype='multipart/form-data' 
        name="frm_videos"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="videos">

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txt_titulo">Título</label>
        <input value="<?php echo $titulo ?>" name="txt_titulo" id="txt_titulo" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_video">Link</label>
        <input value="<?php echo $link ?>" name="txt_video" id="txt_video" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_descricao">Descrição</label>
        <textarea name="txt_descricao" id="txt_descricao" required><?php echo $descricao?></textarea>
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