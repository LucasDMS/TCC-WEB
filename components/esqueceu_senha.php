<div class="modal-form">
	<form   onsubmit="asyncSubmit(event, this)" 
            action="cms/router.php?controller=sessao&modo=logar" 
            name="frm_login" 
            id="frm_login" 
			method="post">
			
		<p>Digite o seu e-mail para que possamos prosseguir com a recuperação de senha.</p>

		<div class="modal-item">
            <label for="txt_senha">E-mail</label>
            <input name="txt_senha" type="email" id="txt_senha" required>
        </div>

		<button type='submit'>Enviar</button>
		
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
        data: new FormData($("#frm_login")[0]),
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(html){
        if(html == "1"){
            window.location.href = 'autenticacao.php';
        }
    });
}

</script>