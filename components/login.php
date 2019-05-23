<div class="modal-form">
    <form   onsubmit="asyncSubmit(event, this)" 
            action="cms/router.php?controller=sessao&modo=logar" 
            name="frm_login" 
            id="frm_login" 
            method="post">
            <?php
                ini_set('display_errors',1);
                ini_set('display_startup_errors',1);
                error_reporting(E_ALL);
            ?>
        <p>Uma conta só para todos os produtos da<br/>POP's Soda Drink</p>

        <div class="modal-item">
            <label for="txt_login">Login</label>
            <input name="txt_login" id="txt_login" type="text" class="text" required autocomplete="username">
        </div>
        
        <div class="modal-item">
            <label for="txt_senha">Senha</label>
            <input name="txt_senha" type="password" class="text" id="txt_senha" required autocomplete="current-password">
        </div>

        <button type='submit'>Login</button>

        <a href="#" onclick="chamarViewParaModal('esqueceu_senha')">Esqueceu a senha?</a>

        <div id="cadastro_itens">
            <span id="cadastro_item" onclick="verificarTipoUsuario(false)">
                Não tem cadastro? clique aqui!
            </span>
        </div>
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
            window.location.href = 'autenticacao.php';
        }else{
            alert("Usuário ou senha incorretos!");
        }
    });
}

function verificarTipoUsuario(){
    const div = document.getElementById('cadastro_itens');

    const itemPF = "<span onclick=chamarViewParaModal('cadastro_usuario')>Pessoa fisica</span>"
    const itemPJ = "<span onclick=chamarViewParaModal('cadastro_estabelecimento')>Pessoa Juridica</span>"
    const itemVt = "<span onclick=voltar()><i class='fas fa-caret-left'></i>Voltar</span>"
    const itemArray = itemVt + itemPF + itemPJ

    div.innerHTML = itemArray
}

function voltar(){
    const div = document.getElementById('cadastro_itens')

    div.innerHTML = "<span id='cadastro_item' onclick=verificarTipoUsuario(false)>Não tem cadastro? clique aqui !</span>"
}

</script>