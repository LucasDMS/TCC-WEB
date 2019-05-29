<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerCarrinho.php");
$action = "router.php?controller=cadastro_carrinho&modo=inserir";

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action;?>"
        method="post"
        autocomplete="off"
        id="frm_carrinho"
        enctype='multipart/form-data' 
        name="frm_carrinho"
        class="form_padrao"
        data-id="<?php echo $id; ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="carrinho">

        <div class="inputDados">
            <label from="txtNome">Nome</label>
            <input type="text" name="txtNome" id="txtNome"  value=""><br>
        </div>
        <div class="inputDados">
            <label from="txtNumeroCartao">Número do Cartão</label>
            <input type="text" name="txtNumeroCartao" id="txtNumeroCartao" value=""><br>
        </div>
        <div class="inputDados">
            <label from="txtCvv">Código de verificação</label>
            <input type="text" name="txtCvv" id="txtCvv"  value=""><br>
        </div>
        <div class="inputDados">
            <label from="txtValidade">Data de validade do Cartão</label>
            <input type="date" name="txtValidade" id="txtValidade" value=""><br>
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