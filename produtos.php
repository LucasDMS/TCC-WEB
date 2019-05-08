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
    <link rel="stylesheet" href="css/produtos.css">

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

        <section class="section_produtos">
            
            <?php		
				$sql = "select * from tbl_texto_principal where  tipo_texto =  'Produtos'";
				$stm = $con->prepare($sql);
				$success = $stm->execute();
				foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
            ?>
            
            <div class="section_header">
                <h2 class="section_titulo"><?php echo ($result['titulo']) ?></h2>
                <p class="section_desc">
                   <?php echo ($result['texto']) ?>
                </p>
            </div>
            
            <?php
                }
            ?>
            <div class="produtos_container">

            
            <?php
            
                $produto_esquerda = true;

                $sql = "select * from vw_produtos_site where apagado = 0 and ativo = 1";
                $stm = $con->prepare($sql);
                $success = $stm->execute();
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){	
            ?>

            <?php
            // pra arrumar a posicao -> flex-direction: row-reverse;


                if ($produto_esquerda){
                    $posicao = "esquerda";
                    $produto_esquerda = false;
                } else {
                    $posicao = "direita";
                    $produto_esquerda = true;
                }
            ?>

                <!-- PRODUTO -->
                <div class="produto produto_<?php echo $posicao?>">

                    <div class="produto_conteudo">


                        <h3><?php echo ($result['nome']) ?></h3>
                        <div class="produto_info">
                            <img src="cms/<?php echo ($result['imagem']) ?>" alt="">
                            <div>
                                <p>
                                    <?php echo ($result['descricao']) ?>
                                </p>
                                <table class="tabela_nutricional">

                                    <!-- tabela titulo -->
                                    <tr>
                                        <th colspan="3">INFORMAÇÃO NUTRICIONAL</th>
                                    </tr>

                                    <!-- sub titulo -->
                                    <tr>
                                        <th></th>
                                        <th>Quantidade por porção</th>
                                        <th>%VD(*)</th>
                                    </tr>
                        
                                    <!-- Loop info -->
                                    <tr>
                                        <td>Valor Calórico</td>
                                        <td><?php echo ($result['valor_calorico']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td><?php echo ($result['carboidratos']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Fibra Alimentar</td>
                                        <td><?php echo ($result['fibra_alimentar']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Gorduras Saturadas</td>
                                        <td><?php echo ($result['gorduras_saturadas']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Gorduras Totais</td>
                                        <td><?php echo ($result['gorduras_totais']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Gorduras Trans</td>
                                        <td><?php echo ($result['gorduras_trans']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Proteína</td>
                                        <td><?php echo ($result['proteina']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Sódio</td>
                                        <td><?php echo ($result['sodio']) ?></td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">(*)% Valpres Diários de referência com base em uma dieta...</td>
                                    </tr>
                                </table>
                            </div>
                        </div> 
                    </div>
                </div>
            <?php } ?>  
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