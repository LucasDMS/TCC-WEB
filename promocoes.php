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
    <link rel="stylesheet" href="css/promocoes.css">

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

    <main>

		<section class="base_paginas">

			<div class="section_conteudo_center">
				<div class="titulo_promo">
					<i class="fas fa-award"></i>
					<h3>Promo titulo</h3>
					<i class="fas fa-award"></i>
				</div>
				
				<img src="img/1.jpg" alt="">

				<p>
					Promo desc - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut voluptatibus 
					neque odit commodi voluptatem repellendus 
					libero ad. Minima unde deserunt, assumenda, id, temporibus asperiores molestiae odit quam illum animi tenetur?
				</p>

				<p>
					Promo como participar - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut voluptatibus 
					neque odit commodi voluptatem repellendus 
					libero ad. Minima unde deserunt, assumenda, id, temporibus asperiores molestiae odit quam illum animi tenetur?
				</p>

				<p>
					Promo premios - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut voluptatibus 
					neque odit commodi voluptatem repellendus 
					libero ad. Minima unde deserunt, assumenda, id, temporibus asperiores molestiae odit quam illum animi tenetur?
				</p>

				<button class="btn" type="submit">
					Quero participar!
					<i class="fas fa-award"></i>
				</button>

			</div>

		</section>
        
	</main>

	<!-- CHATBOT -->
	<?php require_once("components/chat_bot.php"); ?>

	<!-- FOOTER -->
	<?php require_once("components/footer.php"); ?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>