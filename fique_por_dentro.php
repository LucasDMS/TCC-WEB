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

        <section class="base_paginas fique_por_dentro">
            
            <?php	
                $sql = "select * from tbl_texto_principal where  tipo_texto =  'Fique por dentro'";
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

			<?php	
                $sql = "select * from tbl_noticias_fique_por_dentro where  apagado = 0 and ativo = 1";
				$stm = $con->prepare($sql);
				$success = $stm->execute();
				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
            ?>

            <i class="fas fa-newspaper principal_img"></i>

            <div class="noticia_main">
                <h2><?php echo ($result['titulo']) ?></h2>
                <p>
                    <?php echo ($result['texto']) ?>
                </p>
            </div>

           <!-- varias noticias -->
            <div class="noticias_3_3">
                <div class="noticias_3_3_container">
                    <div class="noticia">
                        <h3><?php echo ($result['titulo']) ?></h3>
                        <p>
                            <?php echo ($result['texto']) ?>
                        </p>

                    </div>
                </div>
            </div>
			<?php
                }
            ?>
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