<?php 

    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerCompras.php");

    $id = $_GET['id'];
    $Controller = new ControllerCompras();
    $produto = $Controller->buscarComprasId($id);
    $nome = $produto->getNome();
    $descricao = $produto->getDescricao();
    $imagem = $produto->getImagem();
    $preco = $produto->getPreco();

?>


        <div class="inputDados">
            <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome;?>" disabled><br>
        </div>
        <div class="inputDados">
            <img class="card_imagem" src='../cms/<?php echo $imagem?>'>
        </div>
        <div class="inputDados">
            <textarea name="txtDescricao" id="txtDescricao" disabled><?php echo $descricao;?></textarea><br>
        </div>
        <div class="inputDados">
            <input type="text" name="txtPreco" id="txtPreco" value="<?php echo 'R$ '.$preco.',00';?>" disabled><br>
        </div>
        
        

