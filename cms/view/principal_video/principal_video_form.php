<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: dados do texto principal de video
    */
    
    $action = "router.php?controller=principal_video&modo=inserir";
    $modo = "inserir";
    $texto= null;
    $link = null; 
    $descricao = null; 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPrincipalVideo.php");
        
        $Controller = new ControllerPrincipalVideo();
        $Principal_video = $Controller->buscarPrincipalVideoPorId($id);
    
        $action = "router.php?controller=principal_video&modo=atualizar";
        $modo = "atualizar";
        $texto = $Principal_video->getTexto();
        $id = $Principal_video->getId();
     }
?>


<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_principal_video"
        enctype='multipart/form-data' 
        name="frm_principal_video"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="principal_video">

        <input type="text" name="txt_texto" id="txt_texto" value="<?php echo $texto; ?>" placeholder="Texto"><br>
    
    <button class="btn">
        Enviar
    </button>

</form>