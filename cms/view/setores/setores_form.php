<?php 

 $action = "router.php?controller=setores&modo=inserir";
 $modo = "inserir";   
 $id = null;
 $rua = null;
 $capacidade = null;
 $prateleira = null;

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerSetores.php");

    $Controller = new ControllerSetores();
    $Setores = $Controller->buscarSetoresPorId($id);
    $Prateleira = $Controller->buscarSetoresPorPrateleira($id);
    $action = "router.php?controller=setores&modo=atualizar";
    $modo = "atualizar";
    $id = $Setores->getId();
    $rua = $Setores->getRua();
 }

 $modo == "atualizar" ? $paginaTitulo = "Atualizar setores" : $paginaTitulo = "Novo Setor";

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_setores"
        enctype='multipart/form-data' 
        name="frm_setores"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="setores">

    <h2><?php echo $paginaTitulo?></h2>

    <div class="inputDados">
        <label from="txt_rua">Rua</label>
        <input type="text" name="txt_rua" id="txt_rua" value="<?php echo $rua;?>" required><br>
    </div>
    <?php
        if($modo == "atualizar"){
            foreach($Prateleira as $result){
                echo("
                    <div class='inputDados'>
                        <label from='txt_prateleira'>Prateleira</label>
                        <input type='text' name='txt_prateleira[]' id='txt_prateleira' value='".$result->getPrateleira()."' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required><br>
                    </div>
                    <div class='inputDados'>
                        <label from='txt_capacidade'>Capacidade</label>
                        <input type='text' name='txt_capacidade[]' id='txt_capacidade' value='".$result->getCapacidade()."' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required><br>
                    </div>
                
                
                ");
            }
        }else{
            echo("
                <div class='inputDados'>
                    <label from='txt_prateleira'>Prateleira</label>
                    <input type='text' name='txt_prateleira[]' id='txt_prateleira' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required><br>
                </div>
                <div class='inputDados'>
                    <label from='txt_capacidade'>Capacidade</label>
                    <input type='text' name='txt_capacidade[]' id='txt_capacidade' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required><br>
                </div>
                <a id='novo_setores'><!-- descarrega uma nova resposta -->
                            
                </a>
                <a href='#' onclick='nova_input_setores()'>
                    <img src='view/imagem/novo.png'>
                    <label>Nova Pateleira</label><br><br>
                </a>
            ");
        }


    ?>
    
    
        
    <button class="btn">
        Enviar
    </button>

</form>