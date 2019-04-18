<?php 
class ControllerProdutos{
    
    private $ProdutoDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Produtos.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/ProdutosDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/view/components/imagem.php');
        $this->ProdutoDAO = new ProdutoDAO();
    }
    public function ativarProduto() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Produto = new Produtos(); 

            $Produto->setId($id);
            $Produto->setAtivo($ativo);
            
            $this->ProdutoDAO->updateAtivo($Produto);
        }
    }
    
    public function buscarProdutos(){
        return $this->ProdutoDAO->selectAll();
    }
}
?>