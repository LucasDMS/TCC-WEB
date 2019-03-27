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
    <link rel="stylesheet" href="css/info_comerciais.css">

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

	<main id="app">
        <section class="section infos_comerciais">

        <h2 class="section_titulo">Estabelecimentos Parceiros</h2>

        <div class="section_conteudo_center">

            <p class="section_desc">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos aspernatur eos labore pariatur? Doloribus
                distinctio eos illo dolor. Adipisci, distinctio voluptas! Debitis id repellendus dolores amet? Ipsa
                dignissimos
                facilis natus?
            </p>

            <form class="form_infos_comerciais" action="">

                <label for="txt_pesquisa_estabelecimento">Pesquise por um estabelecimento:</label>

                <div style="display: flex">
                    <input type="text" name="txt_pesquisa_estabelecimento" id="txt_pesquisa_estabelecimento"
                        placeholder="Estabelecimento">

                    <input type="submit" value="aa" id="btn_pesquisa_estab">
                </div>

            </form>

        </div>

        </section>

        <div class="cor_fundo_1">

        <div class="estabelecimentos_container">
            <div class="estabelecimentos_lista">

                <h3>Lista de Estabelecimentos</h3>

                <ul class="lista_estabelecimentos">
                    <li>Estabelecimento 1</li>
                    <li>Estabelecimento 1</li>
                    <li>Estabelecimento 1</li>
                    <li>Estabelecimento 1</li>
                    <li>Estabelecimento 1</li>
                </ul>

            </div>

            <div class="estabelecimento_mais_detalhes">

                <img src="img/bar_do_ze.jpg" alt="">

                <div class="infestab_texto">
                    <h3>Estabelecimento nome</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, quo ab! Optio, necessitatibus
                        ducimus! Fuga hic saepe incidunt. Nemo laudantium voluptas amet cum aliquid quisquam eligendi
                        tempora vel odit dolore.
                    </p>
                </div>

            </div>

        </div>

        </div>
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