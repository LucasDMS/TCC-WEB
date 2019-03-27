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

    <section class="section fale_conosco">

        <h2 class="section_titulo">Fale Conosco</h2>

        <div class="section_conteudo_center">

            <p class="section_desc">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos aspernatur eos labore pariatur? Doloribus
                distinctio eos illo dolor. Adipisci, distinctio voluptas! Debitis id repellendus dolores amet? Ipsa
                dignissimos
                facilis natus?
            </p>

            <video width="320" height="240" controls>
                <source src="https://www.youtube.com/watch?v=aq95kcb-M8A" type="video/mp4">
            </video>

        </div>
    </section>


    <div class="descricao_video_baixo">
        <br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce
        posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.
        Nunc viverra imperdiet enim. Fusce est.
        Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
        egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. <br />
    </div>

    <div class="titulo_mais">
        Mais Vídeos Sobre a Empresa
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