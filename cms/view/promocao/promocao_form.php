<?php 

$action = "router.php?controller=promocao&modo=inserir";
$nome = null;
$imagem = null;
$dataInicio = null;
$dataFinal = null;
$tipoTexto = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerPromocao.php");

    $Controller = new ControllerPromocao();
    $Promocao = $Controller->buscarPromocaoPorId($id);

    $action = "router.php?controller=promocao&modo=atualizar";
    $modo = "atualizar";
    $id = $Sustentabilidade->getId();
    $texto = $Sustentabilidade->getTexto();

}

?>
<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_promocao" 
        enctype='multipart/form-data' 
        name="frm_promocao" 
        class="form_padrao"
        data-id="<?php echo $id?>"
        data-modo="<?php echo $modo?>"
        data-pagina="promocao">

    <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome?>" required>
    <input type="date" name="txtDataInicio" id="txtDataInicio" value="<?php echo $nome?>" required>
    <input type="date" name="txtDataFinal" id="txtDataFinal" value="<?php echo $nome?>" required>
    <input type="text" name="txtTipoTexto" id="txtTipoTexto" value="<?php echo $nome?>" required>
    <input type="file" name="img" id="img"/>

    <button class="btn">
        Enviar
    </button>
</form>