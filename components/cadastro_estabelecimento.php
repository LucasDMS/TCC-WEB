<div class="modal-form">
    <form   onsubmit="asyncSubmit(event, this)" 
            action="cms/router.php?controller=cadastro_estabelecimento&modo=inserir" 
            name="frm_cadastro" 
            id="frm_cadastro" 
            method="post">
        
        <div class="modal-item">
            <label for="txt_cad_usuario">
                Usuário
            </label>
            <input name="txt_cad_usuario" id="txt_cad_usuario" type="text" required autocomplete="username">
        </div>

        <div class="modal-item">
            <label for="txt_cad_senha">
                Senha
            </label>
            <input name="txt_cad_senha" id="txt_cad_senha" type="password" required autocomplete="current-password">
        </div>

        <div class="modal-item">
            <label for="txt_cad_cnpj">
                CNPJ
            </label>
            <input name="txt_cad_cnpj" id="txt_cad_cnpj" type="text" required maxlenght="20">
        </div>

        <div class="modal-item">
            <label for="txt_cad_razao_social">
                Razão social
            </label>
            <input name="txt_cad_razao_social" id="txt_cad_razao_social" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_nome_fantasia">
                Nome fantasia
            </label>
            <input name="txt_cad_nome_fantasia" id="txt_cad_nome_fantasia" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_responsavel">
                Responsavel
            </label>
            <input name="txt_cad_responsavel" id="txt_cad_responsavel" type="text" required><!--txt_nome-->
        </div>

        <div class="modal-item">
            <label for="txt_cad_tipo_estabelecimento">
                Tipo de estabelecimento
            </label>
            <input name="txt_cad_tipo_estabelecimento" id="txt_cad_tipo_estabelecimento" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_renda">
                Renda média
            </label>
            <input name="txt_cad_renda" id="txt_cad_renda" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_descricao">
                Descrição
            </label>
            <input name="txt_cad_descricao" id="txt_cad_descricao" type="text" required >
        </div>

        <div class="modal-item">
            <label for="txt_cad_endereco">
                Logradouro
            </label>
            <input name="txt_cad_endereco" id="txt_cad_endereco" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_bairro">
                Bairro
            </label>
            <input name="txt_cad_bairro" id="txt_cad_bairro" type="text" required>
        </div>

        <div class="modal-item">
            <label for="txt_cad_cidade">
                Cidade
            </label>
            <input name="txt_cad_cidade" id="txt_cad_cidade" type="text" required>
        </div>
        
        <div class="modal-item">
            <label for="txt_cad_estado">
                UF
            </label>
            <input name="txt_cad_estado" id="txt_cad_estado" type="text" required maxlenght="2">
        </div>

        <div class="modal-item">
            <label for="txt_cad_email">
                E-mail
            </label>
            <input name="txt_cad_email" id="txt_cad_email" type="email" required>
        </div>

        <div class="modal-item">
            <label for="img_estabelecimento">
                Logo
            </label>
            <input name="img_estabelecimento" id="img_estabelecimento" type="file" required>
            <!-- <input type=file name="img" id="txt_nome_fantasia"> -->
        </div>
        
        <button type='submit' >Cadastrar</button>

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
        data: new FormData($("#frm_cadastro")[0]),
        cache: false,
        contentType: false,
        processData: false,
    })
}

</script>