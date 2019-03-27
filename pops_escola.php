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
	<link rel="stylesheet" href="css/pops_escola.css">

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

	<div class="escola_container">

	<!-- A tabela principal que controla todo o conteúdo do site -->
	<div class="tabela_principal center_div">

		<!-- Controla a tela de fundo do site -->
		<div class="tbl_escola_fundo">
			<h2>Pesquise sobre a sua escola</h2>
			<form class="form_pesquisa" action="">
				<input class="form_pesquisa_input" type="text" placeholder="Busque alguma escola parceira">
				<div class="form_pesquisa_submit">
					<i class="fas fa-search"></i>
				</div>
			</form>

			<!-- Controla a tela de fundo da escola -->
			<div class="tbl_fundo_escola">

				<!-- Controla a primeira imagem da escola -->
				<div class="imagem_escola" onclick="funcao_abrir_fechar('img_1')">
					<img alt="imagem da escola" src="img/colegio_benjamin.jpg">

					<!-- Controla o primeiro nome da escola -->
					<div class="nome_escola">
						Colégio Benjamin Franklin
					</div>

					<!-- Controla o primeiro conteúdo dentro da tela de fundo que está por cima -->
					<div class="conteudo_escola" id="img_1">

						<!-- Controla o primeiro titulo dentro da tela de fundo que está por cima -->
						<div class="titulo_conteudo center_div">
							Colégio Benjamin Franklin
						</div>

						<!-- Controla a primeira descricao dentro da tela de fundo que está por cima -->
						<div class="descricao_conteudo center_div">
							Descricao sobre a escola
						</div>
					</div>
				</div>

				<!-- Controla a segunda imagem do conteúdo dentro da tela de fundo que está por cima -->
				<div class="imagem_escola" onclick="funcao_abrir_fechar('img_2')">
					<img alt="imagem da escola" src="img/colegio_dom.jpg">

					<!-- Controla o segundo nome da escola -->
					<div class="nome_escola">
						Colégio Dom Bosco
					</div>

					<!-- Controla o segundo conteúdo dentro da tela de fundo que está por cima -->
					<div class="conteudo_escola" id="img_2">

						<!-- Controla o segundo titulo dentro da tela de fundo que está por cima -->
						<div class="titulo_conteudo center_div">
							Colégio Dom Bosco
						</div>

						<!-- Controla a segunda descricao dentro da tela de fundo que está por cima -->
						<div class="descricao_conteudo center_div">
							Descricao sobre a escola
						</div>
					</div>
				</div>

				<!-- Controla a terceira imagem do conteúdo dentro da tela de fundo que está por cima -->
				<div class="imagem_escola" onclick="funcao_abrir_fechar('img_3')">
					<img alt="imagem da escola" src="img/colegio_pedro.jpg">

					<!-- Controla o terciro nome da escola -->
					<div class="nome_escola">
						Colégio Estadual Pedro Macedo
					</div>

					<!-- Controla o terceiro conteúdo dentro da tela de fundo que está por cima -->
					<div class="conteudo_escola" id="img_3">

						<!-- Controla o terceiro titulo dentro da tela de fundo que está por cima -->
						<div class="titulo_conteudo center_div">
							Colégio Estadual Pedro Macedo
						</div>

						<!-- Controla a terceira descricao dentro da tela de fundo que está por cima -->
						<div class="descricao_conteudo center_div">
							Descricao sobre a escola
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

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