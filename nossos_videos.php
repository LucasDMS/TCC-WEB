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
	<!-- SUB MENU -->
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

		<section class="nossos_videos">

			<?php		
                $sql = "select * from tbl_texto_principal where  tipo_texto =  'Nossos vídeos'";
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

			<div class="video_novo">
			    
			    <?php		
					$sql = "select * from tbl_videos where apagado = 0 and ativo = 1 limit 1";
					$stm = $con->prepare($sql);
					$success = $stm->execute();
					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
        		?>
			
				<iframe 
					width="1490" 
					height="614" 
					src="<?php echo utf8_encode ($result['link'])?>" 
					frameborder="0" 
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					allowfullscreen>
				</iframe>

				<div class="video_info">
                    
                    <h3><?php echo utf8_encode ($result['titulo']) ?></h3>
					<p>
						<?php echo utf8_encode ($result['descricao']) ?>
					</p>

				</div>
                
                 <?php
                    }
                 ?>
                
			</div>

			

			<div class="mais_videos">

				<h3 class="section_titulo">veja mais videos</h3>

				<div class="mais_videos_container">
                <?php		
				    $sql = "select * from tbl_videos where apagado = 0 and ativo = 1";
					$stm = $con->prepare($sql);
					$success = $stm->execute();
					foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
        		?>
					<ul class="videos_lista">
						<li>
							<iframe 
					            width="380" 
					            height="380" 
							    src="<?php echo utf8_encode ($result['link'])?>" alt="Vídeo" frameborder="0" 
					            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
					            allowfullscreen>
                            </iframe>
                            
                                <h4><?php echo utf8_encode ($result['titulo']) ?></h4>
                        </li>
                        <?php
                            }
                        ?>	
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