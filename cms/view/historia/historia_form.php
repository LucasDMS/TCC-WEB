<?php 
$texto = null;
$action = "router.php?controller=funcionario&modo=inserir";
$modo = "inserir";
$id = "";
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerFuncionario.php");
    $Controller = new ControllerFuncionario();
    $Funcionario = $Controller->buscarFuncionarioPorId($id);
    $action = "router.php?controller=historia&modo=atualizar";
    $modo = "atualizar";
    $texto = $Historia->getTexto();
    $id = $Historia->getId();
}
?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_funcionario" 
        data-id="<?php echo $id ?>"
        enctype='multipart/form-data' 
        name="frm_funcionario"
        data-pagina="funcionario"
        data-modo="<?php echo $modo?>"
        class="form_padrao">

    <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?></textarea>

    <button class="btn">
        Enviar
    </button>
</form>