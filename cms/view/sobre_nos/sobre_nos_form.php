<?php

/* 
    Projeto: MVC página de formulario do Sobre_Nos.
    Autor: Kelvin
    Data Criação: 08/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: formulario do Sobre_Nos.
*/

$texto = null;
$titulo = null;
$action = "router.php?controller=sobre_nos&modo=inserir";
$modo = "inserir";
$id = "";
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerSobre_Nos.php");
    $Controller = new ControllerSobre_Nos();
    $Sobre_Nos = $Controller->buscarSobre_NosPorId($id);
    $action = "router.php?controller=sobre_nos&modo=atualizar";
    $modo = "atualizar";
    $titulo = $Sobre_Nos->getTitulo();
    $texto = $Sobre_Nos->getTexto();
    $id = $Sobre_Nos->getId();
}
?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_sobre_nos" 
        data-id="<?php echo $id ?>"
        enctype='multipart/form-data' 
        name="frm_sobre_nos"
        data-pagina="sobre_nos"
        data-modo="<?php echo $modo?>"
        class="form_padrao">

    <div class="inputDados">
        <input value="<?php echo $texto ?>" name="txtTexto" type="text"  tabindex=1 required>
        <label from="txtTexto">Texto</label>
    </div>
    
    <textarea name="txt_titulo" id="txt_titulo" required><?php echo $titulo?></textarea>
    <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?></textarea>

    <button class="btn">
        Enviar
    </button>
</form>