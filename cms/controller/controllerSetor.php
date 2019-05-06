<?php 
class ControllerSetor{
    
    private $SetorDAO;
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Setor.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Prateleira.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/ProdutoSetor.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/MateriaPrimaSetor.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/SetorDAO.php');
        $this->SetorDAO = new SetorDAO();
    }
    
    
    public function buscarSetorPorId(){
        $id = $_GET['id'];
        return $this->SetorDAO->selectById($id);
    }

    public function buscarSetorMateriaPorId(){
        $id = $_GET['id'];
        return $this->SetorDAO->selectByIdMateria($id);  
    }

    public function buscarSetor(){
        return $this->SetorDAO->selectAll();
    }
}
?>