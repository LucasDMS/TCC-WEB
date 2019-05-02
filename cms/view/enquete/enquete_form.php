<?php 

 $action = "router.php?controller=enquete&modo=inserir";
 $modo = "inserir";   
 $id = null;
 $nome = null;
 $pergunta = null;
 $resposta = null;
 $resposta1 = null;

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerEnquete.php");

    $Controller = new ControllerEnquete();
    $Enquete = $Controller->buscarEnquetePorId($id);
    $PerguntaSelect = $Controller->buscarPerguntaPorId($id);

    $action = "router.php?controller=enquete&modo=atualizar";
    $modo = "atualizar";
    $id = $PerguntaSelect->getId();
    $pergunta = $PerguntaSelect->getPergunta();
    $data = $PerguntaSelect->getData();
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

        <h2>Enquete</h2>

    <div class="inputDados">
        <input type="date" name="date" id="date" value="<?php echo $data;?>" required><br>
    </div>
    <div class="inputDados">
        <input type="text" name="txt_pergunta" id="txt_pergunta" placeholder="Pergunta" value="<?php echo $pergunta;?>" required><br>
    </div>
    <?php 
        if($modo == "atualizar"){
            foreach($Enquete as $result){      
            echo("
                <div class='inputDados'>
                    <input type='text' name='txt_resposta[]' id='txt_resposta' placeholder='Resposta' value='".$result->getResposta()."'; required><br>
                </div>
                "); 
    ?>
    <?php
            }
        }else{
            echo("
            <div class='inputDados'>
                <input type='text' name='txt_resposta[]' id='txt_resposta' placeholder='Resposta' required><br>
            </div>
            <?php var_dump($resposta);?>
            <a id='novo'><!-- descarrega uma nova resposta -->
                
            </a>
            <a href='#' onclick='nova_input()'>
                <label>Nova Resposta</label>
            </a>
            
            
            ");
        }
    ?>

    
    
    <button class="btn">
        Enviar
    </button>

</form>