<?php 

$action = "router.php?controller=materia_prima&modo=inserir";
$modo = "inserir";   
$id = null;
$nome = null;
$descricao = null;
$tipo_materia = null;
$tipo_embalagem = null;
$quantidade = null;
$validade = null;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerMateriaPrima.php");

    $Controller = new ControllerMateriaPrima();
    $MateriaPrima = $Controller->buscarMateriaPrimaPorId($id);

    $action = "router.php?controller=materia_prima&modo=atualizar";
    $modo = "atualizar";
    $id = $MateriaPrima->getId();
    $nome = $MateriaPrima->getNome();
    $descricao = $MateriaPrima->getDescricao();
    $tipo_materia = $MateriaPrima->getTipoMateria();
    $quantidade = $MateriaPrima->getQuantidade();
    $validade = $MateriaPrima->getDataValidade();

    if($tipo_materia == "Materia"){
        $tipo_materia = "selected";
    }else{
        $tipo_embalagem = "selected";
    }
}

$modo == "atualizar" ? $paginaTitulo = "Atualizar materia prima" : $paginaTitulo = "Nova Materia Prima";

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_materia_prima"
        enctype='multipart/form-data' 
        name="frm_materia_prima"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="materia_prima">

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txt_nome">Nome</label>
        <input value="<?php echo $nome ?>" name="txt_nome" id="txt_nome" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_descricao">Descrição</label>
        <textarea name="txt_descricao" id="txt_descricao" requerid ><?php echo $descricao ?></textarea>
    </div>

    <div class="inputDados">
        <label from="txt_estado">Quantidade</label>
        <input value="<?php echo $quantidade ?>" name="txt_quantidade" id="txt_quantidade" type="text" required>
    </div>

    <div class="inputDados">
        <label from="txt_cidade">Tipo Materia</label>
        <select name="txt_tipo_materia" required>
            <option value="Materia" <?php echo $tipo_materia?>>Materia Prima</option>
            <option value="Embalagem" <?php echo $tipo_embalagem?>>Embalagem</option>   
        <select>
    </div>

    <div class="inputDados">
        <label from="txt_date">Validade</label>
        <input value="<?php echo $validade ?>" name="txt_date" id="txt_date" type="date" required>
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