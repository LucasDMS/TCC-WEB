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
    <link rel="stylesheet" href="css/nossos_videos.css">

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

		<section class="nossos_videos">

			<h2 class="section_titulo">Nossos vídeos</h2>
			
			<p class="section_desc">
				Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos aspernatur eos labore pariatur? Doloribus
				distinctio eos illo dolor. Adipisci, distinctio voluptas! Debitis id repellendus dolores amet? Ipsa
				dignissimos
				facilis natus?
			</p>

			<div class="video_novo">
				<iframe 
					width="1490" 
					height="614" 
					src="https://www.youtube.com/embed/F2OQozbkTm8" 
					frameborder="0" 
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>

				<div class="video_info">

					<h3>video titulo</h3>

					<p>
						video desc - Lorem ipsum dolor sit amet consectetur adipisicing elit. 
						Pariatur labore id ab ut officia harum, unde reiciendis nulla doloribus omnis, 
						fugit impedit sint dolore distinctio dolorem alias, nam iste porro.
					</p>

				</div>

			</div>

			

			<div class="mais_videos">

				<h3 class="section_titulo">veja mais videos</h3>

				<div class="mais_videos_container">

					<ul class="videos_lista">
						<li>
							<img src="img/video_1.jpg" alt="">
							<h4>titulo</h4>
						</li>
						<li>
							<img src="img/video_2.jpg" alt="">
							<h4>titulo</h4>
						</li>
						<li>
							<img src="img/video_3.jpg" alt="">
							<h4>titulo</h4>
						</li>
						<li>
							<img src="img/video_1.jpg" alt="">
							<h4>titulo</h4>
						</li>
						<li>
							<img src="img/video_2.jpg" alt="">
							<h4>titulo</h4>
						</li>
					</ul>

				</div>

				

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