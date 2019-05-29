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

        <div class="titulosform">
            <label>Dados do cartão</label>
        </div>
        <div class="inputDados">
            <label from="txtNumeroCartao">Número do Cartão</label>
            <input type="number" name="txtNumeroCartao" id="txtNumeroCartao" value="" required><br>
        </div>
        <div class="inputDados">
            <label from="txtCvv">Código de verificação</label>
            <input type="number" maxlength="3" name="txtCvv" id="txtCvv"  value="" required><br>
        </div>
        <div class="inputDados">
            <label from="txtValidade">Data de validade do Cartão</label>
            <input type="date" name="txtValidade" id="txtValidade" value="" required><br>
        </div>
        <div class="titulosform">
            <label>Dados pessoais</label>
        </div>
        <div class="inputDados">
            <label from="txtNome">Nome</label>
            <input type="text" name="txtNome" id="txtNome"  value="" autocomplete="off" required><br>
        </div>
        <div class="inputDados">
            <label from="txtEmail">E-Mail</label>
            <input type="email" name="txtEmail" id="txtEmail" value="" required><br>
        </div>
        <div class="inputDados">
            <label from="txtCPF">CPF</label>
            <input type="text" name="txtCPF" id="txtCPF" value="" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );" required><br>
        </div>
        <div class="inputDados">
            <label from="txtCelular">Celular</label>
            <input type="text" name="txtCelular" id="txtCelular" value="" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" required><br>
        </div>
        <div class="inputDados">
            <label from="txtCep">CEP</label>
            <input type="text" name="txtCep" id="txtCep" value="" maxlength="14" required><br>
        </div>
        <div class="inputDados">
            <label from="txtRua">Rua</label>
            <input type="text" name="txtRua" id="txtRua" value="" required><br>
        </div>
        <div class="inputDados">
            <label from="txtBairro">Bairro</label>
            <input type="text" name="txtBairro" id="txtBairro" value=""  required><br>
        </div>
        <div class="inputDados">
            <label from="txtCidade">Cidade</label>
            <input type="text" name="txtCidade" id="txtCidade" value=""  required><br>
        </div>
        <div class="inputDados">
            <label from="txtEstado">Estado</label>
            <input type="text" name="txtEstado" maxlength="2" id="txtEstado" value=""  required><br>
        </div>
        
       
        <div class="flex flex-center">
            <button type="reset" class="btn btn-clear">
                <i class="fas fa-eraser"></i>
            </button>

            <button class="btn btn-submit" onclick="compra()">
                <i class="fas fa-save"></i>
            </button>
        </div>

</form>
<script>
    $('#txtCep').on("blur", function(){

        const value = $('#txtCep').val()
        const url = "https://viacep.com.br/ws/" + value + "/json/"

        $.ajax({ url }).done(function(resposta){
                
            $('#txtRua').val(resposta.logradouro)
            $('#txtBairro').val(resposta.bairro)
            $('#txtCidade').val(resposta.localidade)
            $('#txtEstado').val(resposta.uf)
        })
    })
</script>