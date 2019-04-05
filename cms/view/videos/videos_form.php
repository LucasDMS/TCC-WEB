<?php
    $action = "router.php?controller=videos&modo=inserir";
    $modo = "inserir";  

?>


<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_videos"
        enctype='multipart/form-data' 
        name="frm_videos"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="videos">

        <input type="text" name="txt_titulo" id="txt_titulo" placeholder="Titulo"><br>
        <input type="text" name="txt_video" id="txt_video" placeholder="video" ><br>   
    
    <button class="btn">
        Enviar
    </button>

</form>