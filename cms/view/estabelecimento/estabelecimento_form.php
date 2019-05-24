<?php

/* 
    Projeto: MVC página de formulario do Estabelecimento.
    Autor: Kelvin
    Data Criação: 04/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: formulario do Estabelecimento.
*/

$texto = null;
$action = "router.php?controller=estabelecimento&modo=inserir";
$modo = "inserir";
$id = "";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT']. "/cms" . "/controller/controllerEstabelecimento.php");
    $Controller = new ControllerEstabelecimento();
    $Estabelecimento = $Controller->buscarEstabelecimentoPorId($id);
    $action = "router.php?controller=estabelecimento&modo=atualizar";
    $modo = "atualizar";
    $texto = $Estabelecimento->getTexto();
    $id = $Estabelecimento->getId();
}
?>

<form onsubmit="asyncSubmit(event, this)"
      action="<?php echo $action; ?>"
      method="post"
      autocomplet="off"
      id="frm_estabelecimento"
      data-id="<?php echo $id ?>"
      enctype='multipart/form-data'
      name="frm_estabelecimento"
      data-pagina="estabelecimento"
      data-modo="<?php echo $modo?>"
      class="form_padrao">

    <div class="inputDados">
        <label from="txtTexto">Conteúdo da notícia</label>
        <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?> </textarea>
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