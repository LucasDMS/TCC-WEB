<?php 

$action = "router.php?controller=historia&modo=inserir";

?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_noticia" 
        enctype='multipart/form-data' 
        name="frm_noticia" 
        class="form_padrao">

    <input type="text" name="txt_titulo" id="txt_titulo" required>

    <textarea name="txt_texto" id="txt_texto" required></textarea>

    <button class="btn">
        Enviar
    </button>
</form>