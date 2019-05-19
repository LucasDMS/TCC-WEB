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
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerSobreNos.php");
    $Controller = new ControllerSobreNos();
    $Sobre_Nos = $Controller->buscarSobreNosPorId($id);
    $action = "router.php?controller=sobre_nos&modo=atualizar";
    $modo = "atualizar";
    $titulo = $Sobre_Nos->getTitulo();
    $texto = $Sobre_Nos->getTexto();
    $id = $Sobre_Nos->getId();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar notícia" : $paginaTitulo = "Sobre Nós";

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

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txt_titulo">Título Sobre Nós</label>
        <input value="<?php echo $titulo ?>" name="txt_titulo" id="txt_titulo" type="text" required>
    </div>
    
    <div class="inputDados">
        <label from="txt_texto">Conteúdo Sobre Nós</label>
        <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?></textarea>
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