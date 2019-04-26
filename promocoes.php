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
    <link rel="stylesheet" href="css/promocoes.css">

    <?php require_once("components/palheta_cores.php"); ?>
    
</head>

<body>
	
	<!-- CABEÇALHO -->
	<!-- SUB MENU -->
	<?php
        session_start();
		$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms";
	
		$_SESSION['PATH'] = $_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms/model/Sessao.php";

		require_once($_SESSION['PATH']);
		
		require_once('cms/db/ConexaoMysql.php');
        require_once("components/header.php");
		require_once("components/sub_menu.php");
        require_once("components/modal.php");
	
		$id = 2;
		$idPromocao = 1;
		$modo = "inserir";
		$action = "usuario/router.php?controller=promocao&modo=inserir";
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
	<form 
		onsubmit="asyncSubmit(event,this)"
		action="<?php echo($action) ?>" 
		method="post"
		autocomplete="off"
		id="frm_participar_promocao"
		class="form_padrao"
		name="frm_participar_promocao"
		enctype="multipart/form"
		data-id="<?php echo($id)?>"
		data-id-promocao="<?php echo($idPromocao)?>"
		data-modo="<?php echo($modo)?>"
		data-pagina="promocoes"
	>

		<section class="base_paginas">
			<div class="section_conteudo_center">

			    <?php		
				$sql = "select * from tbl_promocao where apagado = 0 and ativo = 1";
				$stm = $con->prepare($sql);
				$success = $stm->execute();

				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
					$id = $result['id_promocao']; 
			     ?>
				<div class="titulo_promo">
					<i class="fas fa-award"></i>
					<h3><?php echo ($result['nome']) ?></h3>
					<i class="fas fa-award"></i>
				</div>
				
				<img src="cms/<?php echo ($result['imagem']) ?>" alt="imagem da promoção">
               
				<p>
					<?php echo ($result['texto']) ?>
				</p>

				<?php
				}
				if(isset($_SESSION['logado'])){
					$Sessao = new Sessao();
					if($_SESSION['tipo'] == "USUARIO"){
				?>
				<button class="btn" type="submit">
				Quero participar!
				<i class="fas fa-award"></i></button>
				<?php
					}
				}else{
				?>

				<button class="btn" type="reset" onclick="chamarViewParaModal('login', true)">
				Quero participar!
				<i class="fas fa-award"></i>
				</button>

				<?php
				}
                ?> 

			</div> 

		</section>
        
	</form>
	</main>

	<!-- CHATBOT -->
	<?php require_once("components/chat_bot.php"); ?>

	<!-- FOOTER -->
	<?php require_once("components/footer.php"); ?>

	<script src="js/jquery_min.js"></script>
	<script src="js/index.js"></script>
    <script src="usuario/js/async.js"></script>
</body>

</html>