<link rel="stylesheet" href="css/login.css">
<form onsubmit="asyncSubmit(event, this)" action="cms/router.php?controller=cadastro_estabelecimento&modo=inserir" name="frm_cadastro" id="frm_cadastro" method="post">

    <input type=text name="txt_usuario" id="txt_usuario" placeholder="Usuario">
    <input type=password name="txt_senha" id="txt_senha" placeholder="senha">
    
    <input type=text name="txt_cnpj" id="txt_cnpj" placeholder="cnpj">
    <input type=text name="txt_nome" id="txt_nome" placeholder="Nome do responsavel">
    <input type=text name="txt_tipo_estabelecimento" id="txt_tipo_estabelecimento" placeholder="Tipo estabelecimento">
    <input type=text name="txt_renda" id="txt_renda" placeholder="Renda">
    <input type=text name="txt_descricao" id="txt_descricao" placeholder="Descricao">
    <input type=text name="txt_endereco" id="txt_endereco" placeholder="Endereco">
    <input type=text name="txt_bairro" id="txt_bairro" placeholder="Bairro">
    <input type=text name="txt_cidade" id="txt_cidade" placeholder="Cidade">
    <input type=text name="txt_estado" id="txt_estado" placeholder="Estado">
    <input type=email name="txt_email" id="txt_email" placeholder="Email">
    <input type=text name="txt_razao_social" id="txt_razao_social" placeholder="Razão Social">
    <input type=text name="txt_nome_fantasia" id="txt_nome_fantasia" placeholder="Nome Fantasia">
    <input type=file name="img" id="txt_nome_fantasia" placeholder="Nome Fantasia">
    
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
        data: new FormData($("#frm_cadastro")[0]),
        cache: false,
        contentType: false,
        processData: false,
    })
    
}
</script>