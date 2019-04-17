<?php
$action = "router.php?controller=Pops_Escola&modo=inserir";
$modo = "inserir";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerPopsEscola.php");
    $Controller = new ControllerPopsEscola();
    $PopsEscola = $Controller->buscarPopsEscolaPorId($id);
    $action = "router.php?controller=Pops_Escola&modo=atualizar";
    $modo = "atualizar";
    $id = $PopsEscola->getId();
    $nome = $PopsEscola->getNome();
    $descricao = $PopsEscola->getDescricao();
}   
?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_pops_escola"
        enctype='multipart/form-data' 
        name="frm_pops_escola"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="pops_escola">

    <input type="text" name="txt_nome" id="txt_nome" placeholder="nome" value="<?php echo $nome;?>"><br>
    <textarea name="txt_descricao" id="txt_descricao" requerid placeholder="Descrição"><?php echo $descricao;?></textarea><br>
    <input type="file" name="img" id="img"/>
    <button class="btn">
        Enviar
    </button>

</form>