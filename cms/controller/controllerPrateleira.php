<?php 
class ControllerPrateleira{
    
    private $PrateleiraDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/model/Prateleira.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" .'/dao/PrateleiraDAO.php');
        $this->PrateleiraDAO = new PrateleiraDAO();
    }
    
    public function buscarPrateleiraPorId(){
        $id = $_GET['id'];
        return $this->PrateleiraDAO->selectById($id);
        
    }
    public function buscarPrateleira(){
        return $this->PrateleiraDAO->selectAll();
    }
}
?>