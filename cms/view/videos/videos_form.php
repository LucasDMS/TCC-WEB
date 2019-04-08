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

        <input type="text" name="txt_titulo" id="txt_titulo" value="<?php echo $titulo; ?>" placeholder="Titulo"><br>
        <input type="text" name="txt_video" id="txt_video" value="<?php echo $link; ?>" placeholder="video" ><br>   
        <input type="text" name="txt_descricao" id="txt_descricao" value="<?php echo $descricao; ?>" placeholder="Descricao"><br>
    
    <button class="btn">
        Enviar
    </button>

</form>