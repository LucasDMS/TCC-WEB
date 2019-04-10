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
    require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/controller/controllerEstabelecimento.php");
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

    <textarea name="txt_texto" id="txt_texto" required><?php echo $texto?> </textarea>

    <button class="btn">
        Enviar
    </button>
</form>