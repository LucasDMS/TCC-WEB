
<link rel="stylesheet" href="css/login.css">
<form onsubmit="asyncSubmit(event, this)" action="cms/router.php?controller=cadastro_estabelecimento&modo=inserir" name="frm_cadastro" id="frm_cadastro" method="post">

    <input type=text name="txt_usuario" id="txt_usuario" placeholder="Usuario"><br>
    <input type=password name="txt_senha" id="txt_senha" placeholder="senha"><br><br>
    
    <input type=text name="txt_cnpj" id="txt_cnpj" placeholder="cnpj"><br>
    <input type=text name="txt_nome" id="txt_nome" placeholder="Nome do responsavel"><br>
    <input type=text name="txt_tipo_estabelecimento" id="txt_tipo_estabelecimento" placeholder="Tipo estabelecimento"><br>
    <input type=text name="txt_renda" id="txt_renda" placeholder="Renda"><br>
    <input type=text name="txt_descricao" id="txt_descricao" placeholder="Descricao"><br><br>   
    <input type=text name="txt_endereco" id="txt_endereco" placeholder="Endereco"><br>
    <input type=text name="txt_bairro" id="txt_bairro" placeholder="Bairro"><br>
    <input type=text name="txt_cidade" id="txt_cidade" placeholder="Cidade"><br>
    <input type=text name="txt_estado" id="txt_estado" placeholder="Estado"><br>
    <input type=text name="txt_email" id="txt_email" placeholder="Email"><br>
    
    <button type='submit' class="btn submit">
        <i class="fas fa-sign-in-alt"></i>
    </button>

</form>

<script>
function asyncSubmit(event, element){
    event.preventDefault()
    var url = element.getAttribute("action");
        
    $.ajax({
        type: "POST",
        url: url,
        data: new FormData($("#frm_login")[0]),
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(html){
        if(html == "1"){
            window.location.href = 'cms/index.php';
        }
    });
    
}
</script>