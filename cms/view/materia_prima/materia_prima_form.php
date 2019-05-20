<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerMateriaPrima.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerSetor.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerPrateleira.php");
$action = "router.php?controller=materia_prima&modo=inserir";
$modo = "inserir";   
$id = null;
$nome = null;
$descricao = null;
$tipo_materia = null;
$tipo_embalagem = null;
$quantidade = null;
$validade = null;
$Setor = array();
$ControllerSetor = new ControllerSetor();
$ControllerPrateleira = new ControllerPrateleira();
$Setores = $ControllerSetor->buscarSetor();
$Prateleiras = $ControllerPrateleira->buscarPrateleira();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Controller = new ControllerMateriaPrima();
    $MateriaPrima = $Controller->buscarMateriaPrimaPorId($id);
    $Setor =  $ControllerSetor->buscarSetorMateriaPorId($id);
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

    <div class="container">
   
  
        <?php  
            foreach ($Setores as $result1){ 
                
            ?>
            <div class="setor">
                <label>Rua</label>
                <label  for="<?php echo $result1->getId() ?>">
                    <?php echo $result1->getRua(); ?>
                </label>
                <br>
                <br>
                
                
                <?php foreach ($Prateleiras as $result){ 
                    $checked = "";
                  
                        foreach ($Setor as $result5){
                            if($result->getId() == $result5->getIdPrateleira()){
                                $checked = 'checked';
                            }
                        }
                        if($result1->getId() == $result->getIdSetores()){
                    ?>
                        <label>Prateleira</label>
                            <input type="checkbox" <?php echo $checked ?> 
                            value="<?php echo $result->getId()?>" 
                            name="prateleira[]"
                            id="<?php  echo $result->getId();?>">
                        <label for="<?php echo $result->getId();s ?>">
                                <?php echo $result->getPrateleira();
                                ?>
                            </label><br>
                        <label from="txtQuantidade">Quantidade</label>
                        <input type="number" name="txtQuantidade" id="txtQuantidade" disabled value="<?php echo $quantidade; ?>"><br>
                        <?php }
                    }
                    ?>
            </div>
        <?php 
            }
         ?>
    </div>
    <div class="titulosform">
        <label>Tipo de Matéria prima</label>
    </div>
        <select name="txt_tipo_materia" required>
            <option value="Materia" <?php echo $tipo_materia?>>Materia Prima</option>
            <option value="Embalagem" <?php echo $tipo_embalagem?>>Embalagem</option>   
        <select>

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