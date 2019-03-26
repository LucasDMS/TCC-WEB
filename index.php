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

	<style>
		/* PALHETA DE CORES DO SITE */
		/* COR DE BACKGROUND */
		.cor_fundo_1{background-color: #09a552;}
		.cor_fundo_2{background-color: #ffdd00;}
		.cor_fundo_3{background-color: #e70c2c;}
		.cor_fundo_4{background-color: #ffffff;}
		.cor_fundo_5{background-color: red;}
		/* COR DE LETRA */
		.cor_letra_1{color: #09a552;}
		.cor_letra_2{color: #ffdd00;}
		.cor_letra_3{color: #e70c2c;}
		.cor_letra_4{color: #ffffff;}
		.cor_letra_5{color: red;}
	</style>
</head>

<body>
	<!-- CABEÇALHO -->
	<header class="header cor_fundo_1 cor_letra_4">
		<i class="fas fa-bars" onclick="abrirMenu('.menu_esquerda')"></i>

		<a class="logo" href="pages/home.html" onclick="request(event, this)">
			POP's
		</a>

		<i class="fas fa-user-circle" onclick="abrirMenu('.menu_direita'); abrirLogin()"></i>
	</header>

	<!-- REDES SOCIAIS -->
	<div class="redes_socias ">
		<a href="http://www.facebook.com.br" rel="nofollow noopener external" target="_blank" aria-label="facebook">
			<i class="fab fa-facebook-f cor_letra_2"></i>
		</a>

		<a href="http://www.youtube.com" rel="nofollow noopener external" target="_blank" aria-label="youtube">
			<i class="fab fa-youtube cor_letra_2"></i>
		</a>

		<a href="http://www.twitter.com.br" rel="nofollow noopener external" target="_blank" aria-label="twitter">
			<i class="fab fa-twitter cor_letra_2"></i>
		</a>
	</div>

	<!-- SUB MENU -->
	<div class="menu_lateral menu_esquerda">
		<div class="menu_esquerda_container">

			<nav class="cor_letra_3">
				<ul id="menu_navegacao">
					<li><a href="pages/home.html"		  	  onclick="request(event, this)">Página Inicial</a></li>
					<li><a href="pages/produtos.html"		  onclick="request(event, this)">Produtos</a></li>
					<li><a href="pages/promocoes.html"		  onclick="request(event, this)">Promoções</a></li>
					<li><a href="pages/fique_por_dentro.html" onclick="request(event, this)">Fique por dentro</a></li>
					<li><a href="pages/nossa_historia.html"	  onclick="request(event, this)">Nossa história</a></li>
					<li><a href="pages/missao_visao_valores.html"	  onclick="request(event, this)">Missão, visão e valores</a></li>
					<li><a href="pages/pops_escola.html"	  onclick="request(event, this)">POP's na escola com você</a></li>
					<li><a href="pages/nossos_videos.html"	  onclick="request(event, this)">Nossos vídeos</a></li>
					<li><a href="pages/eventos.html"		  onclick="request(event, this)">Próximos eventos</a></li>
					<li><a href="pages/patrocinio.html"		  onclick="request(event, this)">POP's patrocina</a></li>
					<li><a href="pages/infos_comerciais.html" onclick="request(event, this)">Informações comerciais</a></li>
					<li><a href="pages/fale_conosco.html"	  onclick="request(event, this)">Fale conosco</a></li>
				</ul>
			</nav>
					
		</div>        
	</div>

	<!-- LOGIN E CADASTRE-SE -->
	<div class="menu_lateral menu_direita">
		<div class="menu_direita_container">

			<div class="icon">
				<i class="fas fa-circle-notch fa-spin"></i>
			</div>

		</div>        
	</div>

	<div class="espacador"></div>

	<main id="app">

		<?php
		
			require_once("pages/home.html");
		
		?>

	</main>

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
	<footer>
		<div class="footer_principal">
			<div class="footer_container">

				<div>
					<h4>Sobre nós</h4>
					<ul>
						<li><a href="">Produtos</a></li>
						<li><a href="">Promoções</a></li>
						<li><a href="">Fique por dentro</a></li>
						<li><a href="">Hisória da empresa</a></li>
						<li><a href="">Missão, visão e valores</a></li>

					</ul>
				</div>
				<div>
					<h4>POP's +</h4>
					<ul>
						<li><a href="">POP's na escola com você</a></li>
						<li><a href="">Nossos vídeos</a></li>
						<li><a href="">Próximos eventos</a></li>
						<li><a href="">POP's patrocina</a></li>
					</ul>
				</div>
				<div>
					<h4>Para empresas</h4>
					<ul>
						<li><a href="">Informações comerciais</a></li>
						<li><a href="">Fale conosco</a></li>
					</ul>
				</div>
				<div>
					<h4>Busque por algum produto</h4>
					<form action="">
						<label for="txt_presquisa">Produto :</label>
						<input type="text" name="txt_pesquisa" id="txt_pesquisa" placeholder="Produto">
						<input type="submit" value="aa">
					</form>
				</div>

			</div>

		</div>
		<div class="footer_secundario">
			<p>
				Desenvolvido com
				<i class="fas fa-heart ic_coracao"></i>
				por
				<a href="http://roipinheiro.github.io" rel="nofollow noopener external" target="_blank"
					aria-label="Owl Sofware">
					OWL software <span>©</span>
				</a>
				2019 <span>|</span> Todos os direitos reservados
			</p>
		</div>
	</footer>

	<!-- RODA PÉ -->
	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>