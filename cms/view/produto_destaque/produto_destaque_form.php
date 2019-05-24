<?php
/* 
    Projeto: MVC página de formulario do Produto em Destaque.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: formulario do Produto em Destaque.
*/

$texto = null;
$action = "router.php?controller=produto_destaque&modo=inserir";
$modo = "inserir";
$id = "";
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerProdutoDestaque.php");
    $Controller = new ControllerProdutoDestaque();
    $Produto_Destaque = $Controller->buscarProdutoDestaquePorId($id);
    $action = "router.php?controller=produto_destaque&modo=atualizar";
    $modo = "atualizar";
    $texto = $Produto_Destaque->getTexto();
    $id = $Produto_Destaque->getId();
}
?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_produto_destaque" 
        data-id="<?php echo $id ?>"
        enctype='multipart/form-data' 
        name="frm_produto_destaque"
        data-pagina="produto_destaque"
        data-modo="<?php echo $modo?>"
        class="form_padrao">

    <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?></textarea>

    <button class="btn">
        Enviar
    </button>
</form>