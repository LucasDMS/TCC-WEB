<link rel="stylesheet" href="css/login.css">

<div class="login_container">
    <form onsubmit="asyncSubmit(event, this)" action="cms/router.php?controller=sessao&modo=logar" name="frm_login" id="frm_login" method="post">

        <label for="">Login:</label>
        <input name="txt_login" type="text" class="text">

        <label for="">Senha:</label>
        <input name="txt_senha" type="password" class="text" name="" id="">
    
        <a href="" class="a">Esqueceu a senha?</a>
    
        <button type='submit' class="btn submit">
            <i class="fas fa-sign-in-alt"></i>
        </button>
    
        <a href="" class="a">Não tem cadastro? clique aqui!</a>

    </form>

</div>

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
