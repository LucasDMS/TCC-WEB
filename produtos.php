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
    
    <main>

        <section class="section_produtos">

            <div class="section_header">
                <h2 class="section_titulo">Nossos produtos</h2>
                <p class="section_desc">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui tempore error iure libero quas, totam,
                    dicta commodi quae sunt quia cum numquam. Aspernatur quia in quasi cum error dicta minus!
                </p>
            </div>

            <div class="produtos_container">

                <!-- PRODUTO -->
                <div class="produto produto_esquerda">

                    <div class="produto_conteudo">

                        <h3>Protudo nome</h3>
                        <div class="produto_info">
                            <img src="img/coca_cola.png" alt="">
                            <div>
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus soluta culpa ipsa esse
                                    non,
                                    exercitationem nisi repudiandae voluptas similique neque laboriosam eos, sint veniam, ipsam
                                    dolorem qui autem deleniti numquam?
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
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
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

                <!-- PRODUTO -->

                <div class="produto produto_direita">

                    <div class="produto_conteudo">

                        <h3>Protudo nome</h3>
                        <div class="produto_info">

                            <div class="produto_desc">
                                <p>
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus soluta culpa ipsa esse
                                    non,
                                    exercitationem nisi repudiandae voluptas similique neque laboriosam eos, sint veniam, ipsam
                                    dolorem qui autem deleniti numquam?
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
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Carboidratos</td>
                                        <td>23g</td>
                                        <td>3</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3">(*)% Valpres Diários de referência com base em uma dieta...</td>
                                    </tr>
                                </table>

                            </div>

                            <img src="img/coca_cola.png" alt="">
                        </div>

                    </div>

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