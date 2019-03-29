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
    <link rel="stylesheet" href="css/fique_por_dentro.css">

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

        <section class="base_paginas fique_por_dentro">

            <h2 class="section_titulo">Fique por dentro das notícias</h2>

            <p class="section_desc">
				Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos aspernatur eos labore pariatur?
				Doloribus
				distinctio eos illo dolor. Adipisci, distinctio voluptas! Debitis id repellendus dolores amet? Ipsa
				dignissimos
				facilis natus?
            </p>
            
            <i class="fas fa-newspaper principal_img"></i>

            <div class="noticia_main">
                <h2>noticia mais nova</h2>
                <p>
                    texto dela - Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quae at praesentium ipsum animi commodi harum unde! Repellat obcaecati hic aspernatur laboriosam 
                    unde! Quaerat voluptates alias, praesentium qui fugiat perspiciatis?
                    texto dela - Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quae at praesentium ipsum animi commodi harum unde! Repellat obcaecati hic aspernatur laboriosam 
                    unde! Quaerat voluptates alias, praesentium qui fugiat perspiciatis?
                    texto dela - Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quae at praesentium ipsum animi commodi harum unde! Repellat obcaecati hic aspernatur laboriosam 
                    unde! Quaerat voluptates alias, praesentium qui fugiat perspiciatis?
                </p>
            </div>

            <!-- varias noticias -->
            <div class="noticias_3_3">
                <div class="noticias_3_3_container">
                    <div class="noticia">
                        <h3>noticia titulo</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi velit consectetur eos quae iste quisquam eligendi necessitatibus aut non 
                            recusandae vero ipsum, reiciendis autem voluptatum. Incid
                            texto dela - Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quae at praesentium ipsum animi commodi harum unde! Repellat obcaecati hic aspernatur laboriosam 
                            unde! Quaerat voluptates alias, praesentium qui fugiat perspiciatis?unt praesentium laborum voluptas illo.
                        </p>

                    </div>

                    <div class="noticia">
                        <h3>noticia titulo</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi velit consectetur eos quae iste quisquam eligendi necessitatibus aut non 
                            recusandae vero ipsum, reiciendis autem texto dela - Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quae at praesentium ipsum animi commodi harum unde! Repellat obcaecati hic aspernatur laboriosam 
                            unde! Quaerat voluptates alias, praesentium qui fugiat perspiciatis?voluptatum. Incidunt praesentium laborum voluptas illo.
                        </p>

                    </div>

                    <div class="noticia">
                        <h3>noticia titulo</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectettexto dela - Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum quae at praesentium ipsum animi commodi harum unde! Repellat obcaecati hic aspernatur laboriosam 
                            unde! Quaerat voluptates alias, praesentium qui fugiat perspiciatis?ur adipisicing elit. Modi velit consectetur eos quae iste quisquam eligendi necessitatibus aut non 
                            recusandae vero ipsum, reiciendis autem voluptatum. Incidunt praesentium laborum voluptas illo.
                        </p>

                    </div>
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