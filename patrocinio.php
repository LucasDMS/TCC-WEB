<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="description" content="Site da POP's Soda Drink">
	<meta name="keywords" content="POP's Soda Drink">
	<meta name="author" content="Owl Sofware">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>POP'S Soda Drink</title>

	<link media="screen" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <?php require_once("components/palheta_cores.php"); ?>
    
</head>

<body>
	
	<!-- CABEÇALHO -->
	<?php require_once("components/header.php"); ?>

	<!-- SUB MENU -->
	<?php require_once("components/sub_menu.php"); ?>

	<!-- LOGIN E CADASTRE-SE -->
	<div class="menu_lateral menu_direita">
		<div class="menu_direita_container">

			<div class="icon">
				<i class="fas fa-circle-notch fa-spin"></i>
			</div>

		</div>        
	</div>

	<div class="espacador"></div>

    <section class="section fale_conosco">

        <h2 class="section_titulo">Fale Conosco</h2>

        <div class="section_conteudo_center">

            <p class="section_desc">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos aspernatur eos labore pariatur? Doloribus
                distinctio eos illo dolor. Adipisci, distinctio voluptas! Debitis id repellendus dolores amet? Ipsa
                dignissimos
                facilis natus?
            </p>

            <form class="form_fale_conosco" name="frm_fale_conosco" action="../index.php" method="POST">
                <label for="txt_nome">Nome:</label>
                <input type="text" name="txt_nome" id="txt_nome" placeholder="Nome">

                <label for="txt_email">E-mail:</label>
                <input type="email" name="txt_email" id="txt_email" placeholder="E-mail">

                <label for="txt_telefone">Telefone:</label>
                <input type="text" name="txt_telefone" id="txt_telefone" placeholder="Telefone" maxlength="13">


                <label for="txt_celular">Celular:</label>
                <input type="text" name="txt_celular" id="txt_celular" placeholder="Celular" maxlength="14">

                <label for="cbm_estado">Estado: </label>
                <select name="cbm_estado" id="cbm_estado" class="">
                    <option value="0">Selecione seu estado</option>
                </select>

                <label for="cmb_cidade">Cidade:</label>
                <select name="cmb_cidade" id="cmb_cidade" class="">
                    <option value="0">Selecione sua cidade</option>
                </select>

                <label for="txt_comentario">Comentário:</label>
                <textarea name="txt_comentario" id="txt_comentario" placeholder="Comentário" class=""></textarea>

                <div class="flex_center">

                    <input type="reset" name='btn_limpar' class="btn cor_fundo_2 cor_letra_5" value="Limpar">
                    <input type="submit" name='btn_salvar' class="btn cor_fundo_1 cor_letra_4" value="Salvar">

                </div>
            </form>

        </div>
    </section>

	<!-- CHATBOT -->
	<div class="btn_chat_bot">
		<i class="fas fa-comment" id="btn_chat"></i>

		<div class="chat_container">
			<div class="chat_messages"></div>

			<div class="chat_input">
				<form id="form_chat_bot" name="form_chat_bot" action="" autocomplete="off">
					<input id="txt_chat" type="text" name="txt_chat">
					<input type="submit" value="">
				</form>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php require_once("components/footer.php"); ?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>

<link rel="stylesheet" href="css/patrocinio.css">