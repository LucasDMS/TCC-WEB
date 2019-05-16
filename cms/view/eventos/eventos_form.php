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

$modo == "atualizar" ? $paginaTitulo = "Atualizar evento" : $paginaTitulo = "Novo evento";

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

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txt_nome">Título</label>
        <input value="<?php echo $nome ?>" name="txt_nome" id="txt_nome" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_descricao">Descrição</label>
        <textarea name="txt_descricao" id="txt_descricao" requerid ><?php echo $descricao ?></textarea>
    </div>

    <div class="inputDados">
        <label from="txt_date">Data</label>
        <input value="<?php echo $data ?>" name="txt_date" id="txt_date" type="date" required>
    </div>

    <div class="inputDados">
        <label from="txt_estado">Estado</label>
        <input value="<?php echo $estado ?>" name="txt_estado" id="txt_estado" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_cidade">Cidade</label>
        <input value="<?php echo $cidade ?>" name="txt_cidade" id="txt_cidade" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_hora">Horário de início</label>
        <input value="<?php echo $hora ?>" name="txt_hora" id="txt_hora" type="text" required>
    </div>

    <div class="flex flex-center">
        <button type="reset" class="btn btn-clear">
            <i class="fas fa-eraser"></i>
        </button>

        <button class="btn btn-submit">
            <i class="fas fa-save"></i>
        </button>
    </div>

</form>