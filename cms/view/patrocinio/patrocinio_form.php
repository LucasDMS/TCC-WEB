<?php 
$action = "router.php?controller=patrocinio&modo=inserir";
$nome = null;
$descricao = null;
$modo = "inserir";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerPatrocinio.php");
    $Controller = new ControllerPatrocinio();
    $Patrocinio = $Controller->buscarPatrocinioPorId($id);
    $action = "router.php?controller=patrocinio&modo=atualizar";
    $modo = "atualizar";
    $id = $Patrocinio->getId();
    $nome = $Patrocinio->getNome();
    $descricao = $Patrocinio->geDescricao();
}
?>
<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_patrocinio" 
        enctype='multipart/form-data' 
        name="frm_patrocinio" 
        class="form_padrao"
        data-id="<?php echo $id?>"
        data-modo="<?php echo $modo?>"
        data-pagina="patrocinio">

    
    <input type="text" name="txt_nome" id="txt_nome" value="<?php echo $nome?>" required>
    <input type="text" name="txt_descricao" id="txt_descricao" value="<?php echo $descricao?>" required>

    <input type="file" name="img" id="img"/>

    <button class="btn">
        Enviar
    </button>
</form>