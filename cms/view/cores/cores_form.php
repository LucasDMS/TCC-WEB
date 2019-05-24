<?php

$cores = null;
$tipoCores = null;
$id = null;


if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/cms". "/controller/controllerCores.php");

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
    
      <div class="titulosform">
        <label>Cor</label><br>
        </div>
    <input type="color" name="txtCores" id="txtCores" value="<?php echo $cores?>" required><br>
    <br>

    <div class="inputDados">
        <input type="text" name="txtTipoCores" id="txtTipoCores" disabled value="<?php echo $tipoCores?>" required>
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
