<?php 
class ControllerProduto{
    
    private $ProdutoDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Produto.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Setor.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/MateriaPrima.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/TabelaNutricional.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/ProdutoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/view/components/imagem.php');
        $this->ProdutoDAO = new ProdutoDAO();
    }
    public function inserirProduto(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $nome  = $_POST['txtNome'];
            $descricao = $_POST['txtDescricao'];
            $tamanho  = $_POST['txtTamanho'];
            $modoPreparo = $_POST['txtModoPreparo'];
            $tempoProducao  = $_POST['txtTempoProducao'];
            $preco = $_POST['txtPreco'];
            $ipi = $_POST['txtIpi'];
            
            $imagem  = img($_FILES['img']);
            $descricao = $_POST['txtDescricao'];
            $valorCalorico  = $_POST['txtValorCalorico'];
            $carboidratos = $_POST['txtCarboidratos'];
            $proteina  = $_POST['txtProteina'];
            $gordurasTotais = $_POST['txtGordurasTotais'];
            $gordurasSaturadas  = $_POST['txtGordurasSaturadas'];
            $gordurasTrans = $_POST['txtGordurasTrans'];
            $fibras = $_POST['txtFibraAlimentar'];
            $sodio  = $_POST['txtSodio'];
            $produtoDestaque = 0;
            $ordem   = 1;
            $ativo   = 1;
            $apagado = 0;

            $setores = $_POST['setores'];
            $materia = $_POST['materiaprima'];
            $selectEmbalagem = $_POST['selectEmbalagem'];

            $Produto = new Produto(); 
            $Produto->setNome($nome);
            $Produto->setDescricao($descricao);
            $Produto->setTamanho($tamanho);
            $Produto->setModoPreparo($modoPreparo);
            $Produto->setTempoProducao($tempoProducao);
            $Produto->setPreco($preco);
            $Produto->setIpi($ipi);
            $Produto->setAtivo($ativo);
            $Produto->setApagado($apagado);
            $Produto->setOrdem($ordem);
            $Produto->setProdutoDestaque($produtoDestaque);
            $Produto->setImagem($imagem);

            $Nutricional = new Nutricional();
            $Nutricional->setValorCalorico($valorCalorico);
            $Nutricional->setCarboidratos($carboidratos);
            $Nutricional->setProteina($proteina);
            $Nutricional->setGordurasTotais($gordurasTotais);
            $Nutricional->setGordurasSaturadas($gordurasSaturadas);
            $Nutricional->setGordurasTrans($gordurasTrans);
            $Nutricional->setFibrasAlimentar($fibras);
            $Nutricional->setSodio($sodio);

            $Setor = new Setor();
            $Setor->setId($setores);

            $MateriaPrima = new MateriaPrima();
            $MateriaPrima->setId($materia);

            $Embalagem = new MateriaPrima();
            $Embalagem->setId($selectEmbalagem);
            $this->ProdutoDAO->insert($Produto, $Nutricional, $Setor, $MateriaPrima, $Embalagem);
        }
    }
    public function atualizarProduto(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id     = $_POST['id'];
            $idNutricional  = $_POST['idNutricional'];
            
            $nome  = $_POST['txtNome'];
            $descricao = $_POST['txtDescricao'];
            $tamanho  = $_POST['txtTamanho'];
            $modoPreparo = $_POST['txtModoPreparo'];
            $tempoProducao  = $_POST['txtTempoProducao'];
            $preco = $_POST['txtPreco'];
            $ipi = $_POST['txtIpi'];
            
            $imagem  = img($_FILES['img']);
            $descricao = $_POST['txtDescricao'];
            $valorCalorico  = $_POST['txtValorCalorico'];
            $carboidratos = $_POST['txtCarboidratos'];
            $proteina  = $_POST['txtProteina'];
            $gordurasTotais = $_POST['txtGordurasTotais'];
            $gordurasSaturadas  = $_POST['txtGordurasSaturadas'];
            $gordurasTrans = $_POST['txtGordurasTrans'];
            $fibras = $_POST['txtFibraAlimentar'];
            $sodio  = $_POST['txtSodio'];

            $setores = $_POST['setores'];
            $materia = $_POST['materiaprima'];
            $selectEmbalagem = $_POST['selectEmbalagem'];
            $Produto = new Produto(); 
            $Produto->setId($id);
            $Produto->setNome($nome);
            $Produto->setDescricao($descricao);
            $Produto->setTamanho($tamanho);
            $Produto->setModoPreparo($modoPreparo);
            $Produto->setTempoProducao($tempoProducao);
            $Produto->setPreco($preco);
            $Produto->setIpi($ipi);
            $Produto->setImagem($imagem);
            $Nutricional = new Nutricional();
            $Nutricional->setId($idNutricional);
            $Nutricional->setValorCalorico($valorCalorico);
            $Nutricional->setCarboidratos($carboidratos);
            $Nutricional->setProteina($proteina);
            $Nutricional->setGordurasTotais($gordurasTotais);
            $Nutricional->setGordurasSaturadas($gordurasSaturadas);
            $Nutricional->setGordurasTrans($gordurasTrans);
            $Nutricional->setFibrasAlimentar($fibras);
            $Nutricional->setSodio($sodio);

            $Setor = new Setor();
            $Setor->setId($setores);

            $MateriaPrima = new MateriaPrima();
            $MateriaPrima->setId($materia);

            $Embalagem = new MateriaPrima();
            $Embalagem->setId($selectEmbalagem);
            $this->ProdutoDAO->update($Produto, $Nutricional, $Setor, $MateriaPrima, $Embalagem);
        }
    }
    public function excluirProduto(){
        $id = $_POST['id'];
        $this->ProdutoDAO ->delete($id);
    }
    public function ativarProduto() {
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Produto = new Produto(); 

            $Produto->setId($id);
            $Produto->setAtivo($ativo);
            
            $this->ProdutoDAO->updateAtivo($Produto);
        }
    }
    public function buscarProdutoPorId(){
        $id     = $_GET['id'];
        return $this->ProdutoDAO->selectByIdProduto($id);
        
    }
    public function buscarNutricionalPorId(){
        $id     = $_GET['id'];
        return $this->ProdutoDAO->selectByIdNutricional($id);
        
    }
    public function buscarProduto(){
        return $this->ProdutoDAO->selectAll();
    }
}
?>