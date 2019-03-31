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
    <link rel="stylesheet" href="css/nossa_historia.css">

    <?php require_once("components/palheta_cores.php"); ?>
    
</head>

<body>
	
	<?php 
		
		require_once("components/header.php");
		require_once("components/sub_menu.php");
		
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

		<section class="section_historia">

			<h2 class="section_titulo">Nossa História</h2>
			<div class="historia_container">

				<i class="fas fa-book"></i>

				<div class="historia_texto">
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
						ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
						tempora vel odit dolsore.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
						ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
						tempora vel odit dolore.
					</p>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
						ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
						tempora vel odit dolsore.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
						ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
						tempora vel odit dolore.
					</p>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
						ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
						tempora vel odit dolsore.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
						ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
						tempora vel odit dolore.
					</p>
				</div>
			</div>

		</section>

	</main>

	<?php

		require_once("components/chat_bot.php");
		require_once("components/footer.php"); 

	?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>