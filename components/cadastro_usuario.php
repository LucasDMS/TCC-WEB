<link rel="stylesheet" href="css/login.css">
<form onsubmit="asyncSubmit(event, this)" action="cms/router.php?controller=cadastro_usuario&modo=inserir" name="frm_cadastro_usuario" id="frm_cadastro_usuario" method="post">

    <input type=text name="txt_usuario" id="txt_usuario" placeholder="Usuario">
    <input type=password name="txt_senha" id="txt_senha" placeholder="senha">
    
    <input type=text name="txt_cpf" id="txt_cpf" placeholder="CPF">
    <input type=text name="txt_nome" id="txt_nome" placeholder="Nome">
    M<input type=radio name="sexo" id="sexo" value="M" placeholder="Sexo">
    F<input type=radio name="sexo" id="sexo" value="F" placeholder="Sexo">
    <input type=text name="txt_endereco" id="txt_endereco" placeholder="Endereco">
    <input type=text name="txt_bairro" id="txt_bairro" placeholder="Bairro">
    <input type=text name="txt_cidade" id="txt_cidade" placeholder="Cidade">
    <input type=text name="txt_estado" id="txt_estado" placeholder="Estado">
    <input type=email name="txt_email" id="txt_email" placeholder="Email">
    
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
        data: new FormData($("#frm_cadastro_usuario")[0]),
        cache: false,
        contentType: false,
        processData: false,
    })
    
}
</script>