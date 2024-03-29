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
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerFaleConosco.php");

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
$paginaTitulo = "Visualizar mensagem";
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
    <h2><?php echo $paginaTitulo?></h2>
    <div class="inputDados">
        <label from="txtNome">Nome</label>
        <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome?>" disabled>
    </div>
    <div class="inputDados">
        <label from="txtEmail">Email</label>
        <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $email?>" disabled>
    </div>
    <div class="inputDados">
        <label from="txtTelefone">Telefone</label>
        <input type="text" name="txtTelefone" id="txtTelefone" value="<?php echo $telefone?>" disabled>
    </div>
    <div class="inputDados">
        <label from="txtCelular">Celular</label>  
        <input type="text" name="txtCelular" id="txtCelular" value="<?php echo $celular?>" disabled>
    </div>
    <div class="inputDados">
        <label from="txtEstado">Estado</label>
        <input type="text" name="txtEstado" id="txtEstado" value="<?php echo $estado?>" disabled>
    </div>
    <div class="inputDados">
        <label from="txtCidade">Cidade</label>
        <input type="text" name="txtCidade" id="txtCidade" value="<?php echo $cidade?>" disabled>
    </div>
    <div class="inputDados">
        <label from="txtTexto">Texto</label>
        <textarea name="txtTexto" id="txtTexto" disabled><?php echo $texto?></textarea>
    </div>
</form>