<?php 
class ControllerCarrinho{
    
    private $CarrinhoDAO;
    public function __construct(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/usuario" .'/dao/CarrinhoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/usuario" .'/model/Carrinho.php');
        $this->CarrinhoDAO = new CarrinhoDAO();
        
    }
    
    public function buscarCarrinho(){
        $id = $_SESSION['id'];
        return $this->CarrinhoDAO->selectAll($id);
    }
    public function excluirCarrinho(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $id_autenticacao = $_SESSION['id'];
            $this->CarrinhoDAO->delete($id, $id_autenticacao);
        }
    }
    public function buscarBrindePorId(){
        $id = $_GET['id'];
        return $this->CarrinhoDAO->selectById($id);
    }
}
?>