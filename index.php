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
	<link rel="stylesheet" href="css/home.css">

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

	<main id="app">

		<div>
			<section class="section_principal">
				<h2>ALGUMA COISA IMPORTANTE</h2>
			</section>

			<section class="section_destaque">
				<h2 class="section_titulo">DESTAQUES</h2>
				<form class="form_pesquisa" action="">
					<input class="form_pesquisa_input" type="text" placeholder="Busque alguma empresa parceira">
					<div class="form_pesquisa_submit">
						<i class="fas fa-search"></i>
					</div>
				</form>

				<div class="destaques_container">
					<div class="destaques_img">
						<img src="img/coca_cola.png" alt="">
					</div>
					<div class="destaques_texto">
						<h3 class="section_titulo">TITULO</h3>
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
							ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
							tempora vel odit dolore.
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
							ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
							tempora vel odit dolore.
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
							ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
							tempora vel odit dolore.
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
							ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
							tempora vel odit dolore.

						</p>
					</div>
					<aside class="sub_menu_lateral">
						<div class="enquete">
							<h3>Titulo</h3>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti officia, possimus unde
								expedita, dolore nemo incidunt ex soluta illo dolor minus asperiores explicabo facere
								tenetur
								ipsam officiis similique, quae sed!
							</p>
							<ul>
								<li>
									<input type="checkbox" name="ckb" id="ckb">
									<label for="ckb">LAGAE</label>
								</li>
								<li>
									<input type="checkbox" name="ckb" id="ckb">
									<label for="ckb">LAGAE</label>
								</li>
								<li>
									<input type="checkbox" name="ckb" id="ckb">
									<label for="ckb">LAGAE</label>
								</li>
								<li>
									<input type="checkbox" name="ckb" id="ckb">
									<label for="ckb">LAGAE</label>
								</li>
								<li>
									<input type="checkbox" name="ckb" id="ckb">
									<label for="ckb">LAGAE</label>
								</li>
							</ul>
						</div>
						
					</aside>
				</div>
			</section>

			<div class="news_letter">
				<p>
					Recebe a nossa news-letter com todas as novidades da POP's
				</p>
				<form action="">
					<input type="text" placeholder="Digite seu email aqui">
					<input type="submit" value="click">
				</form>
			</div>

			<section class="section_resumos">
				<h2 class="section_titulo">CONHEÇA UM POUCO SOBRE NÓS</h2>
				<div class="resumos_container">

					<div class="resumo">
						<h3>Pagina nome</h3>
						<div>
							<p>
								Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus soluta culpa ipsa esse
								non,
								exercitationem nisi repudiandae voluptas similique neque laboriosam eos, sint veniam, ipsam
								dolorem qui autem deleniti numquam?
							</p>
						</div>
					</div>
					<div class="resumo">
						<h3>Pagina nome</h3>
						<div>
							<p>
								Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus soluta culpa ipsa esse
								non,
								exercitationem nisi repudiandae voluptas similique neque laboriosam eos, sint veniam, ipsam
								dolorem qui autem deleniti numquam?
							</p>
						</div>
					</div>
					<div class="resumo">
						<h3>Pagina nome</h3>
						<div>
							<p>
								Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus soluta culpa ipsa esse
								non,
								exercitationem nisi repudiandae voluptas similique neque laboriosam eos, sint veniam, ipsam
								dolorem qui autem deleniti numquam?
							</p>
						</div>
					</div>

					<div class="resumo">
						<h3>Pagina nome</h3>
						<div>
							<p>
								Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus soluta culpa ipsa esse
								non,
								exercitationem nisi repudiandae voluptas similique neque laboriosam eos, sint veniam, ipsam
								dolorem qui autem deleniti numquam?
							</p>
						</div>
					</div>
				</div>
			</section>

			<section class="section_sustentabilidade">
				<h2 class="section_titulo">SUSTENTABILIDADE</h2>
				<div style="text-align: justify">
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quo quasi magni facere natus
						itaque
						minima animi, corrupti consequuntur, nulla placeat dolorem vero odio. Eum voluptas est veritatis
						error alias.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quo quasi magni facere natus
						itaque
						minima animi, corrupti consequuntur, nulla placeat dolorem vero odio. Eum voluptas est veritatis
						error alias.
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quo quasi magni facere natus
						itaque
						minima animi, corrupti consequuntur, nulla placeat dolorem vero odio. Eum voluptas est veritatis
						error alias.
					</p>
					<div style="display: flex">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quo quasi magni facere natus
							itaque
							minima animi, corrupti consequuntur, nulla placeat dolorem vero odio. Eum voluptas est veritatis
							error alias.
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quo quasi magni facere natus
							itaque
							minima animi, corrupti consequuntur, nulla placeat dolorem vero odio. Eum voluptas est veritatis
							error alias.
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quo quasi magni facere natus
							itaque
							minima animi, corrupti consequuntur, nulla placeat dolorem vero odio. Eum voluptas est veritatis
							error alias.
						</p>
						<img style="height: 300px; padding: 20px" src="img/sustentabilidade.jpg" alt="">
					</div>
				</div>
			</section>
		</div>

	</main>

	<?php

		require_once("components/chat_bot.php");
		require_once("components/footer.php"); 

	?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>