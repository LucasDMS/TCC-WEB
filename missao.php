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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="css/missao_visao_valor.css">

	<?php require_once("components/palheta_cores.php"); ?>

</head>

<body>

	<?php 
		if(!isset($_SESSION['logado'])){
            session_destroy();
        }
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

		<section class="section_missao">

			<?php		
                $sql = "select * from tbl_texto_principal where  tipo_texto =  'Missão, Visão e Valor'";
				$stm = $con->prepare($sql);
				$success = $stm->execute();
				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
			?>

			<h2 class="section_titulo"><?php echo utf8_encode ($result['titulo']) ?></h2>

			<p class="section_desc">
				<?php echo utf8_encode ($result['texto']) ?>
			</p>

			<?php
				}
			?>

			<div class="missao_container">

                <?php		
                    $sql = "select * from tbl_missao_visao_valor where tipo_texto =  'Missão' and ativo = 1 and apagado = 0 limit 1";
				    $stm = $con->prepare($sql);
				    $success = $stm->execute();
				    foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
                ?>
            
				<div>
					<i class="fas fa-check"></i>
					<h2><?php echo utf8_encode ($result['tipo_texto']) ?></h2>
					<p>
						<?php echo utf8_encode ($result['texto']) ?>
					</p>
				</div>
				 <?php
                    }
                 ?>
                 
                 <?php		
                    $sql = "select * from tbl_missao_visao_valor where tipo_texto =  'Visão' and ativo = 1 and apagado = 0 limit 1";
				    $stm = $con->prepare($sql);
				    $success = $stm->execute();
				    foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
                ?>
				
				<div>
					<i class="fas fa-glasses"></i>
					<h2><?php echo utf8_encode ($result['tipo_texto']) ?></h2>
					<p>
						<?php echo utf8_encode ($result['texto']) ?>
					</p>
				</div>
				<?php
                    }
                 ?>
				
				 <?php		
                    $sql = "select * from tbl_missao_visao_valor  where tipo_texto =  'Valor' and ativo = 1 and apagado = 0 limit 1";
				    $stm = $con->prepare($sql);
				    $success = $stm->execute();
				    foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
                ?>
				<div>
					<i class="fas fa-hands-helping"></i>
					<h2><?php echo utf8_encode ($result['tipo_texto']) ?></h2>
					<p>
						<?php echo utf8_encode ($result['texto']) ?>
					</p>
				</div>

                <?php
                    }
                ?>
        
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

	<?php

		require_once("components/chat_bot.php");
		require_once("components/footer.php"); 

	?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>