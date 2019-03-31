<?php 

session_start();

if( isset($_SESSION['logado'])){

    require_once("view/home.php");
}
else{
    header("location:../index.php");
}

?>

<form action="" method="post" autocomplete="on" class="form_padrao">

    <input type="text" name="txt_titulo" id="txt_titulo" required>

    <textarea name="txt_texto" id="txt_texto" required></textarea>

    <button class="btn">
        Enviar
    </button>
</form>