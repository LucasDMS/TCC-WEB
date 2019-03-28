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

	<main>

		<section>
			<h2 class="section_titulo">POP's na escola</h2>

			<p class="section_desc">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. 
				Veritatis quia minima aut beatae sit reprehenderit repellat 
				ipsa! Rerum debitis deleniti numquam possimus sequi, cum ex
				maxime deserunt accusantium quos dicta.

			</p>

			<form action="">
				<label for="">Pesquise blabla:</label>
				<input type="text" placeholder="Veja se sua escola está na lista da POP's">
				<button type="submit">
					<i class="fas fa-search">

					</i>
				</button>
			</form>

			
			<div>
				<!-- lista escolas -->
				<ul>
					<li>
						<img src="" alt="">
						<h3>nome escola</h3>
						<p>
							desc - Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
							Eos qui veniam quae perspiciatis iure quidem ad, a cumque expedita, atque, voluptatibus optio excepturi 
							repellendus veritatis quasi nobis laudantium sint. Temporibus.
						</p>
					</li>

					<li>
						<img src="" alt="">
						<h3>nome escola</h3>
						<p>
							desc - Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
							Eos qui veniam quae perspiciatis iure quidem ad, a cumque expedita, atque, voluptatibus optio excepturi 
							repellendus veritatis quasi nobis laudantium sint. Temporibus.
						</p>
					</li>

					<li>
						<img src="" alt="">
						<h3>nome escola</h3>
						<p>
							desc - Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
							Eos qui veniam quae perspiciatis iure quidem ad, a cumque expedita, atque, voluptatibus optio excepturi 
							repellendus veritatis quasi nobis laudantium sint. Temporibus.
						</p>
					</li>

					<li>
						<img src="" alt="">
						<h3>nome escola</h3>
						<p>
							desc - Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
							Eos qui veniam quae perspiciatis iure quidem ad, a cumque expedita, atque, voluptatibus optio excepturi 
							repellendus veritatis quasi nobis laudantium sint. Temporibus.
						</p>
					</li>
				</ul>
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