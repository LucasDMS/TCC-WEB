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

        <h2>Setores</h2>

    <div class="inputDados">
        <input type="text" name="txt_rua" id="txt_rua" placeholder="Rua" value="<?php echo $rua;?>" required><br>
    </div>
    <?php
        if($modo == "atualizar"){
            foreach($Prateleira as $result){
                echo("
                    <div class='inputDados'>
                        <input type='text' name='txt_prateleira[]' id='txt_prateleira' placeholder='Prateleira' value='".$result->getPrateleira()."' required><br>
                    </div>
                    <div class='inputDados'>
                        <input type='text' name='txt_capacidade[]' id='txt_capacidade' placeholder='Capacidade' value='".$result->getCapacidade()."' required><br>
                    </div>
                
                
                ");
            }
        }else{
            echo("
                <div class='inputDados'>
                    <input type='text' name='txt_prateleira[]' id='txt_prateleira' placeholder='Prateleira' required><br>
                </div>
                <div class='inputDados'>
                    <input type='text' name='txt_capacidade[]' id='txt_capacidade' placeholder='Capacidade' required><br>
                </div>
                <a id='novo_setores'><!-- descarrega uma nova resposta -->
                            
                </a>
                <a href='#' onclick='nova_input_setores()'>
                    <label>Nova Pateleira</label>
                </a>
            ");
        }


    ?>
    
    
        
    <button class="btn">
        Enviar
    </button>

</form>