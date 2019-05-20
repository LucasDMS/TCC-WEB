<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/usuario" . "/controller/controllerBrinde.php");
    $id = $_GET['id'];
    $Controller = new ControllerBrinde();
    $brinde = $Controller->buscarBrindePorId($id);
    $nome = $brinde->getNome();
    $descricao = $brinde->getDescricao();
    $imagem = $brinde->getImagem();
    $preco = $brinde->getPreco();
?>


    <div class="inputDados">
        <label for="txtNome">Nome</label>
        <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome;?>" disabled><br>
    </div>
    <div class="inputDados">
        <img class="card_imagem" src='../cms/<?php echo $imagem?>'>
    </div>
    <div class="inputDados">
        <label for="txtDescricao">Descrição</label>
        <textarea name="txtDescricao" id="txtDescricao" disabled><?php echo $descricao;?></textarea><br>
    </div>
    <div class="inputDados">
        <label for="txtPreco">Preço unitário</label>
        <input type="text" name="txtPreco" id="txtPreco" value="<?php echo 'R$ '.$preco.',00';?>" disabled><br>
    </div>
        