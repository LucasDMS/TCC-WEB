<?php 
$action = "router.php?controller=patrocinio&modo=inserir";
$nome = null;
$descricao = null;
$modo = "inserir";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPatrocinio.php");
    $Controller = new ControllerPatrocinio();
    $Patrocinio = $Controller->buscarPatrocinioPorId($id);
    $action = "router.php?controller=patrocinio&modo=atualizar";
    $modo = "atualizar";
    $id = $Patrocinio->getId();
    $nome = $Patrocinio->getNome();
    $descricao = $Patrocinio->getDescricao();
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar patrocício" : $paginaTitulo = "Novo patrocínio";

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

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txt_nome">Nome</label>
        <input value="<?php echo $nome ?>" name="txt_nome" id="txt_nome" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_descricao">Descrição</label>
        <textarea name="txt_descricao" id="txt_descricao" required><?php echo $descricao?></textarea>
    </div>

    <input type="file" name="img" id="img"/>

    <div class="flex flex-center">
        <button type="reset" class="btn btn-clear">
            <i class="fas fa-eraser"></i>
        </button>

        <button class="btn btn-submit">
            <i class="fas fa-save"></i>
        </button>
    </div>

</form>