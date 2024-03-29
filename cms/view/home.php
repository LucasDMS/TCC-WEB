<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="view/css/index.css">
    <link href="view/fontawesome-free-5.8.2-web/css/all.css" rel="stylesheet">
	
</head>
<body>
    <?php require_once("view/components/alerta.php"); ?>
    <?php require_once("view/components/modal.php"); ?>

    <div class="wrapper">
        <?php require_once('view/components/nav.php'); ?>

        <main id="app">
            <?php require_once("view/components/header.php"); ?>
            <div id="app_content">
                <?php //require_once('boas_vindas/boas_vindas.php'); ?>
            </div>

            <?php require_once("view/components/footer.php"); ?>
        </main>
    </div>

    <script src="view/js/jquery_min.js"></script>
    <script src="view/js/novo.js"></script>
    <script src="view/js/index.js"></script>
    <script src="view/js/async.js"></script>
</body>
</html>