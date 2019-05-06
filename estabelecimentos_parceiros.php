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

        <section class="section_est_parceiros">
            <?php		
				$sql = "select * from tbl_texto_principal where  tipo_texto =  'Estabelecimentos Parceiros'";
				$stm = $con->prepare($sql);
				$success = $stm->execute();
				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
        	?>
            <h2 class="section_titulo">	<?php echo ($result['titulo']) ?></h2>

            <div class="section_conteudo_center">

                <p class="section_desc">
                    <?php echo ($result['texto']) ?>
                </p>

                <?php
					}
				?>

                <form class="form_infos_comerciais" action="">

                    <label for="txt_pesquisa_estabelecimento">Pesquise por um estabelecimento:</label>

                    <div style="display: flex; width: 95%; margin:auto">
                        <input type="text" name="txt_pesquisa_estabelecimento" id="txt_pesquisa_estabelecimento"
                            placeholder="Estabelecimento">

                        <button type="submit" class="btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </form>

            </div>

        </section>

        <div class="bg_color_parceiros" >

        <div class="estabelecimentos_container">

        

            <div class="estabelecimentos_lista">

                <h3>Lista de Estabelecimentos</h3>

                <ul class="lista_estabelecimentos">

                    <?php		
			            $sql = "select * from tbl_estabelecimento where apagado = 0 and ativo = 1";
			            $stm = $con->prepare($sql);
			            $success = $stm->execute();
			            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
                    ?> 
                    <li><?php echo ($result['nome_fantasia']) ?></li>
                    <?php	
                        }
                    ?>
                </ul>

            </div>

            <div class="estabelecimento_mais_detalhes">
                          
                <?php		
			        $sql = "select * from tbl_estabelecimento where apagado = 0 and ativo = 1";
			        $stm = $con->prepare($sql);
			        $success = $stm->execute();
			        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
                ?> 

                <h3 class="cor_letra_5"><?php echo ($result['nome_fantasia']) ?></h3>

                <img src="cms/<?php echo ($result['imagem']) ?>" alt="imagem do estabelecimento">

                <div class="infestab_texto">
                    
                    <p>
                        <?php echo ($result['descricao']) ?>
                    </p>
                </div>
                <?php	
                    }
                ?>
            </div>
        </div>
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