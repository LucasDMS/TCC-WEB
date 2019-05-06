<?php 
$nome = null;
$email = null;
$telefone = null;
$celular = null;
$estado = null;
$cidade = null;
$texto = null;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerFaleConosco.php");

    $Controller = new ControllerFaleConosco();
    $Faleconosco = $Controller-> buscarFaleConoscoPorId($id);

    $action = "router.php?controller=faleconosco&modo=atualizar";
    $modo = "atualizar";
    $id = $Faleconosco->getId();
    $nome = $Faleconosco->getNome();
    $email= $Faleconosco->getEmail();
    $telefone = $Faleconosco->getTelefone();
    $celular = $Faleconosco->getCelular();
    $estado= $Faleconosco->getEstado();
    $cidade = $Faleconosco->getCidade();
    $texto = $Faleconosco->getTexto();
}

?>
<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_historia" 
        data-id="<?php echo $id ?>"
        enctype='multipart/form-data' 
        name="frm_historia"
        data-pagina="faleconosco"
        data-modo="<?php echo $modo?>"
        class="form_padrao">

    <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome?>" required>
    <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $email?>" required>
    <input type="text" name="txtTelefone" id="txtTelefone" value="<?php echo $telefone?>" required>
    <input type="text" name="txtCelular" id="txtCelular" value="<?php echo $celular?>" required>
    <input type="text" name="txtEstado" id="txtEstado" value="<?php echo $estado?>" required>
    <input type="text" name="txtCidade" id="txtCidade" value="<?php echo $cidade?>" required>
    <textarea name="txtTexto" id="txtTexto" required><?php echo $texto?></textarea>
</form>