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
    
    <?php 
        require_once("view/components/header.php");
        require_once('view/components/nav.php'); 
    ?>

    <main id="app_bg">
        <div id="app">
            <?php require_once('view/fale_conosco/fale_conosco_lista.php'); ?>
        </div>
    </main>

    <?php 
        require_once("view/components/footer.php");
    ?>

    <script src="view/js/jquery_min.js"></script>
    <script src="view/js/index.js"></script>
    <script src="view/js/async.js"></script>
</body>
</html>