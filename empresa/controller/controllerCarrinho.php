<?php 
class ControllerCarrinho{
    
    private $CarrinhoDAO;
    public function __construct(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" .'/dao/CarrinhoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" .'/model/Carrinho.php');
        $this->CarrinhoDAO = new CarrinhoDAO();
        
    }
    
    public function buscarCarrinho(){
        $id = $_POST['id'];
        return $this->CarrinhoDAO->selectAll($id);
    }

    public function excluirCarrinho(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id_autenticacao = $_SESSION['id'];
            $this->CarrinhoDAO->delete($id, $id_autenticacao);
        }

    }

    public function buscarComprasId(){
        $id = $_GET['id'];
        return $this->CarrinhoDAO->selectById($id);
    }


}
?>