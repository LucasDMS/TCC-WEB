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
		session_start();
		require_once('cms/db/ConexaoMysql.php');
		require_once("components/header.php");
		require_once("components/sub_menu.php");
		require_once("components/modal.php");

		$conex = new conexaoMysql();

		$con = $conex->connectDatabase();


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

		<div>
			<section class="section_principal">
				<h2>ALGUMA COISA IMPORTANTE</h2>
			</section>

			<section class="section_destaque">
				<h2 class="section_titulo">DESTAQUES</h2>
				<form class="form_pesquisa" action="">
					<input class="form_pesquisa_input" type="text" placeholder="Busque alguma empresa parceira">
					<button class="btn" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</form>


				<div class="destaques_container">

				<?php
					$sql = "select * from vw_produtos_destaque";
					$stm = $con->prepare($sql);
					$success = $stm->execute();
					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        		?>

					<img class="img_destaque" src="cms/<?php echo ($result['imagem'])?>" alt="imagem do produto">

					<div class="destaques_texto">
						<h3 class="section_titulo"><?php echo ($result['nome']) ?></h3>
						<p>
							<?php echo ($result['descricao']) ?>
						</p>
					</div>

				<?php } ?>

				</div>
			</section>

			<div class="enquete">
				<div class="enquete_container">

					<?php
						$sql = "select * from tbl_texto_principal where  tipo_texto =  'Enquete'";
						$stm = $con->prepare($sql);
						$success = $stm->execute();
						foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
					?>

					<h3><?php echo ($result['titulo']) ?></h3>
					<p><?php echo ($result['texto']) ?></p>

					<?php } ?>

					<form action="" method="post">

						<?php
							$sql = "select * from tbl_enquete where  status = 1";
							$stm = $con->prepare($sql);
							$success = $stm->execute();
							foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
						?>

						<ul>
							<li>
								<input type="checkbox" name="ckb" id="ckb">
								<label for="ckb"><?php echo ($result['pergunta']) ?>dol</label>
							</li>
							<li>
								<input type="checkbox" name="ckb2" id="ckb2">
								<label for="ckb2"><?php echo ($result['pergunta']) ?>dol</label>
							</li>
							<li>
								<input type="checkbox" name="ckb3" id="ckb3">
								<label for="ckb3"><?php echo ($result['pergunta']) ?>dol</label>
							</li>
							<li>
								<input type="checkbox" name="ckb4" id="ckb4">
								<label for="ckb4"><?php echo ($result['pergunta']) ?> dol</label>
							</li>
							<li>
								<input type="checkbox" name="ckb5" id="ckb5">
								<label for="ckb5"><?php echo ($result['pergunta']) ?> dol</label>
							</li>
						</ul>

						<?php } ?>

						<button class="btn" type="submit">
							VOTAR
						</button>

					</form>

				</div>
			</div>

			<div class="news_letter">
				<div class="news_letter_container">
					<p>
						Recebe a nossa news-letter com todas as novidades da POP's
					</p>
					<form action="">
						<input type="text" placeholder="Digite seu email aqui">
						<button class="btn" type="submit">
							<i class="fas fa-paper-plane"></i>
						</button>
					</form>
				</div>

			</div>

			<section class="section_resumos">
				<h2 class="section_titulo">CONHEÇA UM POUCO SOBRE NÓS</h2>

				<?php
					$sql = "select * from tbl_conheca_sobre_nos";
					$stm = $con->prepare($sql);
					$success = $stm->execute();
					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        		?>

				<div class="resumos_container">
					<div class="resumo">
						<h3><?php echo ($result['titulo']) ?></h3>
						<div>
							<p>
								<?php echo ($result['texto']) ?>
							</p>
						</div>
					</div>
				</div>
				
				<?php }	?>
				
			</section>

			<section class="section_sustentabilidade">
				<h2 class="section_titulo">SUSTENTABILIDADE</h2>

				<?php
					$sql = "select * from tbl_sustentabilidade where apagado = 0 and ativo = 1";
					$stm = $con->prepare($sql);
					$success = $stm->execute();
					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        		?>

				<div style="text-align: justify display: flex">
					<p>
						<?php echo ($result['texto']) ?>
					</p>
					<div style="display: flex">
						<p>
							<?php echo ($result['texto']) ?>
						</p>
							<img style="height: 300px; padding: 20px" src="cms/<?php echo ($result['imagem'])?>" alt="imagem de sustentabilidade">
					</div>
				</div>

				<?php }	?>

			</section>
		</div>

		<!-- COMENTÁRIOS -->
		<div class="comentarios">
			<h2 class="section_titulo">COMENTÁRIOS</h2>
			<ul class="lista_comentarios">

			        <?php
						$sql = "select * from tbl_comentario";
						$stm = $con->prepare($sql);
						$success = $stm->execute();
						foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        			?>

				<li>
					<img src="cms/<?php echo ($result['imagem']) ?>" alt="">
					<h3><?php echo ($result['nome']) ?></h3>
					<p>
						<?php echo ($result['comentario']) ?>
					</p>
					<span><?php echo ($result['data']) ?></span>
				</li>

				<?php } ?>
			</ul>
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