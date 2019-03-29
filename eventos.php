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
    <link rel="stylesheet" href="css/eventos.css">

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

		<section class="eventos_pagina">

			<h2 class="section_titulo">Próximos eventos</h2>

			<p class="section_desc">
				Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos aspernatur eos labore pariatur? Doloribus
				distinctio eos illo dolor. Adipisci, distinctio voluptas! Debitis id repellendus dolores amet? Ipsa
				dignissimos
				facilis natus?
			</p>

			<div class="eventos_bg">
				<!-- lista de eventos -->
				<ul class="eventos_container">
					<li>
						<i class="fas fa-calendar-alt"></i>
						<div class="evento_bg">
							<h3>
								nome do evento
							</h3>
							<p>
								descricao evento - Lorem ipsum, dolor sit amet consectetur adipisicing
								elit. Voluptatibus totam, blanditiis unde deleniti provident eos, repr
								ehenderit acc Voluptatibus totam, blanditiis unde deleniti provident eos, repr
								ehenderit accusantium molestias iste veritatis dicta rerum quo dolor do
								lore! Molestiusantium molestias iste veritatis dicta rerum quo dolor do
								lore! Molestiae incidunt nisi praesentium dicta?
							</p>
							<div class="container_extra">
								<span class="info_extra">21/11/1995</span>
								<span class="info_extra">17:00</span>
							</div>
							<span class="info_extra">Centro - SP</span>
						</div>
						
					</li>
					<li>
						<i class="fas fa-calendar-alt"></i>
						<div class="evento_bg">
							<h3>
								nome do evento
							</h3>
							<p>
								descricao evento - Lorem ipsum, dolor sit amet consectetur adipisicing
								elit. Voluptatibus totam, blanditiis unde deleniti provident eos, repr
								ehenderit accusantium molestias iste veritatis dicta rerum quo dolor do
								lore! Molestiae incidunt nisi praesentium dicta?
							</p>
							<div class="container_extra">
								<span class="info_extra">21/11/1995</span>
								<span class="info_extra">17:00</span>
							</div>
							<span class="info_extra">Centro - SP</span>
						</div>
					</li>
					<li>
						<i class="fas fa-calendar-alt"></i>
						<div class="evento_bg">
							<h3>
								nome do evento
							</h3>
							<p>
								descricao evento - Lorem ipsum, dolor sit amet consectetur adipisicing
								elit. Voluptatibus totam, blanditiis unde deleniti provident eos, repr
								ehenderit accusantium molestias iste veritatis dicta rerum quo dolor do
								lore! Molestiae incidunt nisi praesentium dicta?
							</p>
							<div class="container_extra">
								<span class="info_extra">21/11/1995</span>
								<span class="info_extra">17:00</span>
							</div>
							<span class="info_extra">Centro - SP</span>
						</div>
						
					</li>
				</ul>

			</div>
		</section>

	</main>

	<?php require_once("components/chat_bot.php"); ?>

	<!-- FOOTER -->
	<?php require_once("components/footer.php"); ?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>