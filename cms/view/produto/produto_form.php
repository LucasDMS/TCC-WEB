<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerProduto.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerSetor.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerMateriaPrima.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPrateleira.php");
//Variaveis do produto
$nome = null;
$descricao = null;
$tamanho = null;
$modoPreparo = null;
$tempoProducao = null;
$preco = null;
$ipi = null;
//Variaveis da tabela nutricional
$valorCalorico = null;
$carboidratos = null;
$proteina = null;
$gordurasTotais = null;
$gordurasSaturadas = null;
$gordurasTrans = null;
$fibraAlimentar = null;
$sodio = null;

$MateriaPrima = array();
$Setor = array();

$quantidade = null;

$Controller = new ControllerProduto();
$ControllerSetor = new ControllerSetor();
$ControllerMateria = new ControllerMateriaPrima();
$ControllerPrateleira = new ControllerPrateleira();
$action = "router.php?controller=produto&modo=inserir";
$modo = "inserir";
$id = "";
$idNutricional = "";
$Setores = $ControllerSetor->buscarSetor();
$MateriasPrimas = $ControllerMateria->buscarMateriaPrima();
$Embalagem = $ControllerMateria->buscarEmbalagem();
$Prateleiras = $ControllerPrateleira->buscarPrateleira();

if(isset($_GET['id']) && isset($_GET['idNutricional'])){
    $id = $_GET['id'];
    $idNutricional = $_GET['idNutricional'];
    $produto = $Controller->buscarProdutoPorId($id);
    $nutricional = $Controller->buscarNutricionalPorId($id);
    $MateriaPrima = $ControllerMateria->buscarMateriaPrimaPorId($id);
    $Setor =  $ControllerSetor->buscarSetorPorId($id);

    $action = "router.php?controller=produto&modo=atualizar";
    $modo = "atualizar";

    $nome = $produto->getNome();
    $descricao= $produto->getDescricao();
    $tamanho = $produto->getTamanho();
    $modoPreparo= $produto->getModoPreparo();
    $tempoProducao = $produto->getTempoProducao();
    $preco = $produto->getPreco();
    $ipi = $produto->getIpi();

    $idNutricional = $nutricional->getId();
    $valorCalorico = $nutricional->getValorCalorico();
    $carboidratos = $nutricional->getCarboidratos();
    $proteina = $nutricional->getProteina();
    $gordurasTotais = $nutricional->getGordurasTotais();
    $gordurasSaturadas = $nutricional->getGordurasSaturadas();
    $gordurasTrans = $nutricional->getGordurasTrans();
    $fibraAlimentar = $nutricional->getFibrasAlimentar();
    $sodio = $nutricional->getSodio();
    foreach ($Setor as $result){ 
        $quantidade = "";
        foreach ($Prateleiras as $result1){ 
            if($result->getIdPrateleira() == $result1->getId()){
                $quantidade = $result1->getQuantidade();
            }
        }
    }
    

}

$modo == "atualizar" ? $paginaTitulo = "Atualizar dados do funcionário" : $paginaTitulo = "Novo funcionário";

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action;?>"
        method="post"
        autocomplete="off"
        id="frm_produto"
        enctype='multipart/form-data' 
        name="frm_produto"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-idNutricional="<?php echo $idNutricional;?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="produto">
       
    
    <div class="inputDados">
        <label from="txtNome">Nome</label>
        <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtDescricao">Descricao</label>
        <textarea name="txtDescricao" id="txtDescricao" required><?php echo $descricao ?></textarea>
       
    </div>

    <div class="inputDados">
        <label from="txtTamanho">Tamanho</label>
        <input type="number" step="0.1" name="txtTamanho" id="txtTamanho" value="<?php echo $tamanho ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtModoPreparo">Modo de Preparo</label>
        <textarea name="txtModoPreparo" id="txtModoPreparo" required><?php echo $modoPreparo ?></textarea>
       
    </div>

    <div class="inputDados">
        <label from="txtTempoProducao">Tempo de Produção</label>
        <input type="number" name="txtTempoProducao" id="txtTempoProducao" value="<?php echo $tempoProducao ?>" required>
    </div>
    <div class="inputDados">
        <label from="txtPreco">Preço Unitário </label>
        <input type="number" step="any" name="txtPreco" id="txtPreco" value="<?php echo $preco?>" required>
    </div>
    <div class="inputDados">
        <label from="txtIpi">IPI</label>
        <input type="number" step="any" name="txtIpi" id="txtIpi" value="<?php echo $ipi?>" required>
    </div>
    
    <input type="file" name="img" id="img"/>
    
    <div class="tituloTabelaNutricional">
        <label>Tabela Nutricional</label>
    </div>

    <div class="inputDados">
        <label from="txtValorCalorico">Valor Calorico</label>
        <input type="number" name="txtValorCalorico" id="txtValorCalorico" value="<?php echo $valorCalorico ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtCarboidratos">Carboidratos</label>
        <input type="number" name="txtCarboidratos" id="txtCarboidratos" value="<?php echo $carboidratos ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtProteina">Proteínas</label>
        <input type="number" name="txtProteina" id="txtProteina" value="<?php echo $proteina ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtGordurasTotais">Gorduras totais</label>
        <input type="number" name="txtGordurasTotais" id="txtGordurasTotais" value="<?php echo $gordurasTotais ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtGordurasSaturadas">Gorduras saturadas</label>
        <input type="number" name="txtGordurasSaturadas" id="txtGordurasSaturadas" value="<?php echo $gordurasSaturadas ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtGordurasTrans">Gorduras trans</label>
        <input type="number" name="txtGordurasTrans" id="txtGordurasTrans" value="<?php echo $gordurasTrans ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtFibraAlimentar">Fibra alimentar</label>
        <input type="number" name="txtFibraAlimentar" id="txtFibraAlimentar" value="<?php echo $fibraAlimentar ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtSodio">Sódio</label>
        <input type="number" name="txtSodio" id="txtSodio" value="<?php echo $sodio ?>" required>
    </div>
    <div class="tituloTabelaNutricional">
        <label>Setores</label><br>
    </div>
    <div class="container">
   
  
        <?php  
            foreach ($Setores as $result){ 
                $checked = "";
                
            ?>
            <div class="setor">
                <label>Rua</label>
                <label  for="<?php echo $result->getId() ?>">
                    <?php echo $result->getRua(); ?>
                </label>
                <br>
                <br>
                
                
                <?php foreach ($Prateleiras as $result4){ 
                    $checked = "";
                  
                        foreach ($Setor as $result5){
                            if($result4->getId() == $result5->getIdPrateleira()){
                                $checked = 'checked';
                            }
                        }
                     
                        if($result->getId() == $result4->getIdSetores()){
                    ?>
                        <label>Prateleira</label>
                        <input type="checkbox" <?php echo $checked ?> 
                        value="<?php echo $result4->getId()?>" 
                        name="prateleira[]"
                        id="<?php  echo $result4->getId();?>">
                        <label  for="<?php echo $result4->getId();s ?>">
                            <?php echo $result4->getPrateleira();
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
    <div class="tituloTabelaNutricional">
        <label>Matérias primas</label><br>
    </div>
    
    <div class="container">
    <?php  
        
        foreach ($MateriasPrimas as $result2){ 
            $checked = "";
        
                foreach ($MateriaPrima as $result3){
                    if($result2->getId() == $result3->getIdMateriaPrima()){
                        $checked = 'checked';
                    }
                }
            ?>

            <input  type="checkbox" <?php echo $checked ?> 
                    value="<?php echo $result2->getId() ?>" 
                    name="materiaprima[]"
                    id="<?php echo 'm'.$result2->getId()?>"
            />

            <label  for="<?php echo 'm'.$result2->getId()?>">
                <?php echo $result2->getNome() ?>
            </label>
            
        <?php } ?>
    </div>
    <div class="tituloTabelaNutricional">
        <label>Embalagem</label><br>
    </div>
    <div class="container">
        <select name="selectEmbalagem" id="selectEmbalagem">
        <?php  
            foreach ($Embalagem as $result){ 
                $selected = "";
                foreach ($MateriaPrima as $result1){
                    if($result->getId() == $result1->getIdMateriaPrima()){
                        $selected = 'SELECTED';
                    }
                }
            ?>
                <option <?php echo $selected;?> value="<?php echo $result->getId()?>"><?php echo $result->getNome() ?></option>
            <?php } ?>
        </select>
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