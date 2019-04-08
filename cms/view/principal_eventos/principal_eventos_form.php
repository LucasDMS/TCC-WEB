<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: dados do texto principal de eventos
    */
    
    $action = "router.php?controller=principal_eventos&modo=inserir";
    $modo = "inserir";
    $texto= null;
    $link = null; 
    $descricao = null; 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPrincipalEventos.php");
        
        $Controller = new ControllerPrincipalEventos();
        $Principal_eventos = $Controller->buscarPrincipalEventosPorId($id);
    
        $action = "router.php?controller=principal_eventos&modo=atualizar";
        $modo = "atualizar";
        $texto = $Principal_eventos->getTexto();
        $id = $Principal_eventos->getId();
     }
?>


<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_principal_eventos"
        enctype='multipart/form-data' 
        name="frm_principal_eventos"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="principal_eventos">

        <input type="text" name="txt_texto" id="txt_texto" value="<?php echo $texto; ?>" placeholder="Texto"><br>
    
    <button class="btn">
        Enviar
    </button>

</form>