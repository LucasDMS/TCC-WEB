<?php 

$action = "router.php?controller=historia&modo=inserir";

?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_historia" 
        enctype='multipart/form-data' 
        name="frm_historia"
        data-pagina="historia" 
        class="form_padrao">

    <textarea name="txt_texto" id="txt_texto" required></textarea>

    <button class="btn">
        Enviar
    </button>
</form>