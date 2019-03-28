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

    <main class="">

		<section>
			<h2 class="section_titulo">Promoções</h2>

			<p class="section_desc">
				Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos aspernatur eos labore pariatur?
				Doloribus
				distinctio eos illo dolor. Adipisci, distinctio voluptas! Debitis id repellendus dolores amet? Ipsa
				dignissimos
				facilis natus?
			</p>


			<div class="section_conteudo_center">

				<h3>Promo titulo</h3>
				
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

				<button>
					Quero participar!
				</button>

			</div>

		</section>
        
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
	<?php require_once("components/footer.php"); ?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>