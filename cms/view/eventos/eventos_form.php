<?php 

 $action = "router.php?controller=eventos&modo=inserir";
 $modo = "inserir";   
 $id = null;
 $nome = null;
 $descricao = null;
 $data = null;
 $estado = null;
 $cidade = null;
 $hora = null;

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerEventos.php");

    $Controller = new ControllerEventos();
    $Eventos = $Controller->buscarEventosPorId($id);

    $action = "router.php?controller=eventos&modo=atualizar";
    $modo = "atualizar";
    $id = $Eventos->getId();
    $nome = $Eventos->getNome();
    $descricao = $Eventos->getDescricao();
    $data = $Eventos->getData();
    $estado = $Eventos->getEstado();
    $cidade = $Eventos->getCidade();
    $hora = $Eventos->getHora();
 }
 

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_eventos"
        enctype='multipart/form-data' 
        name="frm_eventos"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="eventos">

    <input type="text" name="txt_nome" id="txt_nome" placeholder="nome" value="<?php echo $nome;?>"><br>
    <textarea name="txt_descricao" id="txt_descricao" requerid placeholder="Descrição"><?php echo $descricao;?></textarea><br>
    <input type="date" name="txt_date" id="txt_date" value="<?php echo $data;?>"><br>
    <input type="text" name="txt_estado" id="txt_Estado" placeholder="Estado" value="<?php echo $estado;?>"><br>
    <input type="text" name="txt_cidade" id="txt_cidade" placeholder="Cidade" value="<?php echo $cidade;?>"><br>
    <input type="text" name="txt_hora" id="txt_hora" placeholder="Hora" value="<?php echo $hora;?>"><br>
    <button class="btn">
        Enviar
    </button>

</form>