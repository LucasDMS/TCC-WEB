<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: dados do texto principal de patrocinio
    */
    
    $action = "router.php?controller=principal_patrocinio&modo=inserir";
    $modo = "inserir";
    $texto= null;
    $link = null; 
    $descricao = null; 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPrincipalPatrocinio.php");
        
        $Controller = new ControllerPrincipalPatrocinio();
        $Principal_patrocinio = $Controller->buscarPrincipalPatrocinioPorId($id);
    
        $action = "router.php?controller=principal_patrocinio&modo=atualizar";
        $modo = "atualizar";
        $texto = $Principal_patrocinio->getTexto();
        $id = $Principal_patrocinio->getId();
     }
?>


<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_principal_patrocinio"
        enctype='multipart/form-data' 
        name="frm_principal_patrocinio"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="principal_patrocinio">

        <input type="text" name="txt_texto" id="txt_texto" value="<?php echo $texto; ?>" placeholder="Texto"><br>
    
    <button class="btn">
        Enviar
    </button>

</form>