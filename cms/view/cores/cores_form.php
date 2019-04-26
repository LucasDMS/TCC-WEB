<?php

$action = "router.php?controller=cores&modo=inserir";
$cores = null;
$tipoCores = null;
$id = null;
$modo = "inserir";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms". "/controller/controllerCores.php");

    $Controller = new ControllerCores();
    $Cores = $Controller->buscarCoresPorId($id);

    $action = "router.php?controller=cores&modo=atualizar";
    $modo = "atualizar";
    $id = $Cores->getId();
    $cores = $Cores->getCores();
    $tipoCores = $Cores->getTipoCores();
}

?>

<form onsubmit="asyncSubmit(event, this)"
      action="<?php echo $action; ?>"
      method="post"
      autocomplete="off"
      id="frm_cores"
      enctype='multipart/form-data'
      name="frm_cores"
      class="form_padrao"
      data-id="<?php echo $id ?>"
      data-modo="<?php echo $modo?>"
      data-pagina="cores">
          
      <input type="text" name="txtCores" id="txtCores" value="<?php echo $cores?>" required>
      <input type="text" name="txtTipoCores" id="txtTipoCores" value="<?php echo $tipoCores?>" required>
         
      <button class="btn">
          Enviar
      </button>      
    </form>
