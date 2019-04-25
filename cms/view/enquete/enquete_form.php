<?php 

 $action = "router.php?controller=evnquete&modo=inserir";
 $modo = "inserir";   
 $id = null;
 $nome = null;
 $pergunta = null;
 $resposta = null;

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerEnquete.php");

    $Controller = new ControllerEnquete();
    $Enquete = $Controller->buscarEnquetePorId($id);

    $action = "router.php?controller=enquete&modo=atualizar";
    $modo = "atualizar";
    $id = $Enquete->getId();
    $nome = $Enquete->getNome();
    $pergunta = $Enquete->getPergunta();
    $resposta = $Enquete->getResposta();
    $data = $Enquete->getData();
 }

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_enquete"
        enctype='multipart/form-data' 
        name="frm_enquete"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="enquete">

    <input type="text" name="txt_nome" id="txt_nome" placeholder="nome" value="<?php echo $nome;?>"><br>
    <input type="date" name="txt_date" id="date" value="<?php echo $data;?>"><br>
    <input type="text" name="txt_pergunta" id="txt_pergunta" placeholder="Pergunta" value="<?php echo $pergunta;?>"><br>
    <button class="btn">
        Enviar
    </button>

</form>