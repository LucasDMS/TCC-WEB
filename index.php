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


		if(isset($_GET["modo"])){
			if($_GET["modo"]=="logout"){
				session_destroy();
				header("location: index.php");
			}
		}
			
		require_once('cms/db/ConexaoMysql.php');
		require_once("components/header.php");
		require_once("components/sub_menu.php");
		require_once("components/modal.php");
		require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" ."/controller/controllerNewsLetter.php");

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
					$sql = "select * from vw_produtos_destaque where produto_destaque = 1";
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


				<?php
				    }
         ?>

				</div>
			</section>

			<div class="enquete">
				<?php
					$cont = 0;
					if(isset($_POST['btnEnquete'])){
						$cont++;
						$id = $_POST['ckbEnquete'];
						
						$sql = "Select tbl_enquete_resposta.votos from tbl_enquete_resposta WHERE id_resposta=?";
						$stm = $con->prepare($sql);
						$stm->bindValue(1, $id);
						$stm->execute();
						$sucess = $stm->fetch();
						$votos = $sucess['votos'];
						$votos++;

						$sql2 = "UPDATE tbl_enquete_resposta SET votos = ? WHERE id_resposta = ?";
						$stm2 = $con->prepare($sql2);
						$stm2->bindValue(1, $votos);
						$stm2->bindValue(2, $id);
						$stm2->execute();

					}

					
				?>

				<div class="enquete_container">
					<h3>Enquete</h3><!--Titulo da enquete-->
					
					<!-- select de pergunta -->
					<?php
						$sql = "select * from tbl_enquete where status=1";
						$stm = $con->prepare($sql);
						$success = $stm->execute();
						foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
							$idE[] = $result['id_enquete'];
							$enqueteP[] = $result['pergunta'];
						}
					?>
					
					<p><?php echo ($enqueteP[$cont]);?></p> <!--Pergunta da enquete-->
					
					<form action="index.php" method="post">
                        
          	             <?php		
							$sql = "select tbl_resposta.respostas, tbl_resposta.id_resposta FROM tbl_resposta, tbl_enquete_resposta WHERE tbl_enquete_resposta.id_enquete =".$idE[$cont]." and tbl_enquete_resposta.id_resposta = tbl_resposta.id_resposta;";
							$stm = $con->prepare($sql);
							$success = $stm->execute();
							foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
                        ?>

						<ul>
							<li>
								<input type="radio" name="ckbEnquete" id="ckbEnquete" value="<?php echo ($result['id_resposta']) ?>" required/>
								<label for="ckbEnquete"><?php echo ($result['respostas']) ?></label><br>
								
							</li>
							
						</ul>
                        
                        <?php
							}
					    ?>
						<button class="btn" type="submit" name="btnEnquete">
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
					<form
					onsubmit="asyncSubmit(event, this)"
					name="frm_news_letter"
					action="cms/router.php?controller=news_letter&modo=inserir" 
					method="post"
					autocomplete="off"
					id="news_letter"
					enctype='multipart/form-data' 
					class="form_padrao"
					data-pagina="news_letter">
						<input type="text" placeholder="Digite seu email aqui" name="txtNewsLetter" id="txtNewsLetter">
						<button class="btn" type="submit">
							<i class="fas fa-paper-plane"></i>
						</button>
					</form>
				</div>

			</div>

			<section class="section_resumos">
				<h2 class="section_titulo">CONHEÇA UM POUCO SOBRE NÓS</h2>

				<?php		
					$sql = "select * from tbl_conheca_sobre_nos where  apagado = 0 and ativo = 1";

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
						$sql = "select * from vw_listar_posts where ativo = 1 and aprovado = 1";
						$stm = $con->prepare($sql);
						$success = $stm->execute();
						foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
        			?>

				<li>
					<img src="cms/<?php echo ($result['autor_foto']) ?>" alt="foto">
					<h3><?php echo ($result['autor']) ?></h3>
					<p>
						<?php echo ($result['texto']) ?>
					</p>
					<span><?php echo ($result['data_publicacao']) ?></span>
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