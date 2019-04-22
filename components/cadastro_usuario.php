<div class="modal-form">
    <form   onsubmit="asyncSubmit(event, this)" 
            action="cms/router.php?controller=cadastro_usuario&modo=inserir" 
            name="frm_cadastro_usuario" 
            id="frm_cadastro_usuario" 
            method="post">

        <div class="modal-item">
            <label for="txt_cad_nome">Nome</label>
            <input name="txt_cad_nome" id="txt_cad_nome" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">Usuário</label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
        </div>

        <div class="modal-item">
            <label for="txt_cad_senha">Senha</label>
            <input name="txt_cad_senha" id="txt_cad_senha" type="password" required autocomplete="current-password">
        </div>

        <div class="modal-item">
            <label for="txt_cad_cpf">CPF</label>
            <input name="txt_cad_cpf" id="txt_cad_cpf" type="text" required maxlength="20">
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">Sexo</label>
            M<input type=radio name="sexo" id="sexo" value="M" placeholder="Sexo" required>
            F<input type=radio name="sexo" id="sexo" value="F" placeholder="Sexo" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_cep">CEP</label>
            <input name="txt_cad_cep" id="txt_cad_cep" type="text" required maxlength="9">
        </div>

        <div class="modal-item">
            <label for="txt_cad_logradouro">Logradouro</label>
            <input name="txt_cad_logradouro" id="txt_cad_logradouro" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_bairro">Bairro</label>
            <input name="txt_cad_bairro" id="txt_cad_bairro" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_cidade">Cidade</label>
            <input name="txt_cad_cidade" id="txt_cad_cidade" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_uf">UF</label>
            <input name="txt_cad_uf" id="txt_cad_uf" type="text" required maxlength="2">
        </div>

        <div class="modal-item">
            <label for="txt_cad_email">E-mail</label>
            <input name="txt_cad_email" id="txt_cad_email" type="email" required>
        </div>

        <button type='submit'>Cadastre-se</button>

        <span onclick="chamarViewParaModal('login')"><i class='fas fa-caret-left'></i>Voltar</span>
    </form>
</div>

<script>

function asyncSubmit(event, element){
    event.preventDefault()
    var url = element.getAttribute("action");
        
    $.ajax({
        type: "POST",
        url: url,
        data: new FormData($("#frm_cadastro_usuario")[0]),
        cache: false,
        contentType: false,
        processData: false,
    })
    
}

$('#txt_cad_cep').on("blur", function(){

    const value = $('#txt_cad_cep').val()
    const url = "https://viacep.com.br/ws/" + value + "/json/"

    $.ajax({ url }).done(function(resposta){
            
        $('#txt_cad_logradouro').val(resposta.logradouro)
        $('#txt_cad_bairro').val(resposta.bairro)
        $('#txt_cad_cidade').val(resposta.localidade)
        $('#txt_cad_uf').val(resposta.uf)
    })
})

    

</script>