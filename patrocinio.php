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

    <?php require_once("components/palheta_cores.php"); ?>
    
</head>

<body>
	
	<!-- CABEÇALHO -->
	<!-- SUB MENU -->
	<?php
        session_start();
		require_once('cms/db/ConexaoMysql.php');
        require_once("components/header.php");
        require_once("components/sub_menu.php");
    
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
		<section class="patrocinio">

			<?php		
                $sql = "select * from tbl_texto_principal where  tipo_texto =  'Patrocinados'";
				$stm = $con->prepare($sql);
				$success = $stm->execute();
				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
			?>

			<h2 class="section_titulo"><?php echo ($result['titulo']) ?></h2>

			<p class="section_desc">
				<?php echo ($result['texto']) ?>
			</p>

			<?php
				}
			?>

			<div class="patrocinio_bg">
				<div class="patrocinio_container">
					<!-- patrocinado -->
					<ul class="lista_patrocinio"> 
				        <?php		
					       $sql = "select * from tbl_patrocinio";
					       $stm = $con->prepare($sql);
					       $success = $stm->execute();
					       foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
        		        ?>
						<li>
							<img src="cms/<?php echo ($result['imagem']) ?>" alt="imagem do Patrocinio">
							<div>
								<h3><?php echo ($result['nome']) ?></h3>
								<p>
									<?php echo ($result['descricao']) ?>
								</p>
							</div>
						</li>
						<?php
                            }
                        ?>
					</ul>
				</div>
			</div>
		</section>

	</main>

	<?php require_once("components/chat_bot.php") ?>

	<!-- FOOTER -->
	<?php require_once("components/footer.php"); ?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
</body>

</html>

<link rel="stylesheet" href="css/patrocinio.css">