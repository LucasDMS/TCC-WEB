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
	<link rel="stylesheet" href="css/missao_visao_valor.css">

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

	<div class="cor_da_linha_dois">
		<!--cor fundo linha 2-->
		<div class="linha2_missao_valor_missao centerdiv">
			<!--conteudo missao-->
			<div class="titulo" id="missao">
				Missão
			</div>
			<div class="descricao">
				Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo
				utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
				embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como
				também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na
				década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente
				quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.

			</div>
		</div>
	</div>

	<div class="cor_da_linha_um">
		<!--cor fundo linha 3-->
		<div class="linha2_missao_valor_missao centerdiv">
			<!--conteudo visao-->
			<div class="titulo formatacao_black" id="visao">
				Visão
			</div>
			<div class="descricao">
				Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo
				utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
				embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como
				também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na
				década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente
				quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.
			</div>
		</div>
	</div>

	<div class="cor_da_linha_dois">
		<!--cor fundo linha 3-->
		<div class="linha2_missao_valor_missao centerdiv" id="valor">
			<!--conteudo valor-->
			<div class="titulo">
				Valor
			</div>
			<div class="descricao">
				Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo
				utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
				embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como
				também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na
				década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente
				quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.
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