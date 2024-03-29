<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="description" content="Site da POP's Soda Drink">
	<meta name="keywords" content="POP's Soda Drink">
	<meta name="author" content="Owl Sofware">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>POP'S Soda Drink | Fale - Conosco</title>

	<link media="screen" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="css/fale_conosco.css">

    <?php require_once("components/palheta_cores.php"); ?>
    
</head>

<body>
	
	<?php 
		if(!isset($_SESSION['logado'])){
            session_destroy();
        }
		require_once('cms/db/ConexaoMysql.php');
		require_once("components/header.php");
		require_once("components/sub_menu.php");
		require_once("components/modal.php");
		require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerFaleConosco.php");
		
		$conex = new conexaoMysql();
		$con = $conex->connectDatabase();

	?>

	<!-- LOGIN E CADASTRE-SE -->
	<div class="menu_lateral menu_direita">
		<div class="menu_direita_container">

			<div class="icon">
				<i class="fas fa-circle-notch fa-spin"></i>
			</div>

		</div>        
	</div>

	<div class="espacador"></div>

	<main>

		<section class="section_fale_conosco">
			<?php		
                $sql = "select * from tbl_texto_principal where  tipo_texto =  'Fale Conosco'";
				$stm = $con->prepare($sql);
				$success = $stm->execute();
				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
			?>
			<h2 class="section_titulo"> <?php echo utf8_encode ($result['titulo']) ?></h2>

			<p class="section_desc">
				<?php echo utf8_encode ($result['texto']) ?>
			</p>
			<?php
				}
			?>
            
             <script>

                function Validar(caracter, blockType, campo){
                document.getElementById(campo).style="background-color:#ffffff;";


                    if(window.event)
                        //guarda o ascii da letra digitada pelo usuário
                        var letra = caracter.charCode;
                        else
                        //guarda o ascii da letra digitada pelo usuário
                        var letra = caracter.which;

                        //Verificar se o tipo do bloqueio é para numeros ou caracteres
                        if(blockType=='number') {

                        //Bloqueio de Numeros
                        if(letra >= 48 && letra <= 57){
                            document.getElementById(campo).style="background-color:#ffffff;";
                            //Cancela a ação da tecla
                            return false;
                          }
                        }else if(blockType=='caracter'){
                        //Bloqueio de letras
                        if(letra < 48 || letra > 57){
                              document.getElementById(campo).style="background-color:#ffffff;";
                            //Cancela a ação da tecla
                            return false;
                            }
                        }    
                    }
            </script>
            
			<form 
				onsubmit="asyncSubmit(event, this)"
				class="form_fale_conosco form_padrao" name="frm_fale_conosco"
				action="cms/router.php?controller=fale_conosco&modo=inserir" 
				method="post"
				autocomplete="off"
				id="fale_conosco"
				enctype='multipart/form-data' 
				data-pagina="fale_conosco">

				<label for="txtNome">Nome:</label>
				<input type="text" name="txtNome" id="txtNome" placeholder="Nome" title="Nome Completo" onkeypress="return Validar(event, 'number',this.id);">

				<label for="txtEmail">E-mail:</label>
				<input type="email" name="txtEmail" id="txtEmail" placeholder="E-mail"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Exemplo: exemplo.nada@email.com.br ou exemplo.nada@email.com">

				<label for="txtTelefone">Telefone:</label>
				<input type="text" name="txtTelefone" id="txtTelefone" placeholder="Telefone" maxlength="13" title="Exemplo:(11)1234-5678" onkeypress="return Validar(event,'caracter', this.id);">


				<label for="txtCelular">Celular:</label>
				<input type="text" name="txtCelular" id="txtCelular" placeholder="Celular" maxlength="14" title="Exemplo:(11) 91234-5678" onkeypress="return Validar(event,'caracter', this.id);">
				
				<label for="txtCEP">CEP:</label>
				<input type="text" name="txtCEP" id="txtCEP" placeholder="CEP" maxlength="14" title="Exemplo: 06626-050" onkeypress="return Validar(event,'caracter', this.id);">
				
				<label for="txtEstado">Estado:</label>
				<input type="text" name="txtEstado" id="txtEstado" placeholder="Estado" maxlength="14" onkeypress="return Validar(event,'number', this.id);">

				<label for="txtCidade">Cidade:</label>
				<input type="text" name="txtCidade" id="txtCidade" placeholder="Cidade" maxlength="14" onkeypress="return Validar(event,'number', this.id);">

				<label for="txt_comentario">Comentário:</label>
				<textarea name="txtTexto" id="txt_comentario" placeholder="Comentário" class=""></textarea>

				<div class="flex_center">

					<input type="reset" name='btn_limpar' class="btn cor_fundo_3 cor_letra_5" value="Limpar">
					<input type="submit" name='btn_salvar' class="btn cor_fundo_5 cor_letra_4" value="Salvar" onclick="<?php header("Refresh: 0"); ?>">
					
				</div>
			</form>
		</section>

	</main>

	<?php

		require_once("components/chat_bot.php");
		require_once("components/footer.php"); 
	?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>

	<script>
		$('#txtCEP').on("blur", function(){

			const value = $('#txtCEP').val()
			const url = "https://viacep.com.br/ws/" + value + "/json/"

			$.ajax({ url }).done(function(resposta){
				$('#txtCidade').val(resposta.localidade)
				$('#txtEstado').val(resposta.uf)
			})
		})
</script>
</body>

</html>