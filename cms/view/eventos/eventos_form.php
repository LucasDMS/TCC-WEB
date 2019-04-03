<?php 

 $action = "router.php?controller=eventos&modo=inserir";
 $modo = "inserir";   
 $id = null;

 

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_eventos"
        enctype='multipart/form-data' 
        name="frm_eventos"
        class="form_padrao"
        data-modo="<?php echo $modo; ?>"
        data-pagina="eventos">

    <input type="text" name="txt_nome" id="txt_nome" placeholder="nome"><br>
    <textarea name="txt_descricao" id="txt_descricao" requerid placeholder="Descrição"></textarea><br>
    <input type="date" name="txt_date" id="txt_date"><br>
    <input type="text" name="txt_estado" id="txt_Estado" placeholder="Estado"><br>
    <input type="text" name="txt_cidade" id="txt_cidade" placeholder="Cidade"><br>
    <input type="text" name="txt_hora" id="txt_hora" placeholder="Hora"><br>
    <button class="btn">
        Enviar
    </button>

</form>