<div class="modal-form">
    <form   onsubmit="asyncSubmit(event, this)" 
            action="cms/router.php?controller=cadastro_usuario&modo=inserir" 
            name="frm_cadastro_usuario" 
            id="frm_cadastro_usuario" 
            method="post">

        <div class="modal-item">
            <label for="txt_cad_usuario">
                Nome
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=text name="txt_nome" id="txt_nome" placeholder="Nome" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                Usuário
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=text name="txt_usuario" id="txt_usuario" placeholder="Usuario" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                Senha
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=password name="txt_senha" id="txt_senha" placeholder="senha" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                CPF
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=text name="txt_cpf" id="txt_cpf" placeholder="CPF" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                Sexo
            </label>
            M<input type=radio name="sexo" id="sexo" value="M" placeholder="Sexo" required>
            F<input type=radio name="sexo" id="sexo" value="F" placeholder="Sexo" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                Logradouro
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=text name="txt_endereco" id="txt_endereco" placeholder="Endereco" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                Bairro
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=text name="txt_bairro" id="txt_bairro" placeholder="Bairro" required> 
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                Cidade
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=text name="txt_cidade" id="txt_cidade" placeholder="Cidade" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                UF
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=text name="txt_estado" id="txt_estado" placeholder="Estado" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_usuario">
                E-mail
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
            <input type=email name="txt_email" id="txt_email" placeholder="Email" required>
        </div>

        <button type='submit' class="btn submit">
            <i class="fas fa-sign-in-alt"></i>
        </button>

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
</script>