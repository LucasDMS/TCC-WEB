<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="view/css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
</head>
<body>
    <?php require_once("view/components/alertas.php"); ?>
    <?php require_once("view/components/modal.php"); ?>
    <?php require_once("view/components/header.php"); ?>

    <div class="wrapper">
        <?php require_once('view/components/nav.php'); ?>

        <main id="app">
            <div id="app_content">
                <?php //require_once('boas_vindas/boas_vindas.php'); ?>
            </div>

            <?php require_once("view/components/footer.php"); ?>
        </main>
    </div>
    <script src="https://assets.pagar.me/pagarme-js/3.1/pagarme.min.js"></script>
    <script src="view/js/jquery_min.js"></script>
    <script src="view/js/index.js"></script>
    <script src="view/js/async.js"></script>
    <script src="view/js/mask.js"></script>
    <script src="view/js/pagarme.js"></script>
</body>
</html>