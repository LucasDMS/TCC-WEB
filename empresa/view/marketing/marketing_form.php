<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" . "/controller/controllerEstabelecimento.php");


    $descricao = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $Controller = new ControllerEstabelecimento();

        $estabelecimento = $Controller->buscarEstabelecimento($id);

        $action = "router.php?controller=estabelecimento&modo=atualizar";
        $modo = "atualizar";
        $descricao = $estabelecimento->getDescricao();
        
    }
?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action;?>"
        method="post"
        autocomplete="off"
        id="frm_estabelecimento"
        enctype='multipart/form-data' 
        name="frm_estabelecimento"
        class="form_padrao"
        data-id="<?php echo $id; ?>"
        data-idAutenticacao="<?php echo $idAutenticacao; ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="estabelecimento">

        <div class="inputDados">
            <label from="txtDescricao">Descrição</label>
            <textarea name="txtDescricao" id="txtDescricao" required><?php echo $descricao ?></textarea>
       
        </div>
        <div class="inputDados">
            <input type="file" name="img" id="img"><br>
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