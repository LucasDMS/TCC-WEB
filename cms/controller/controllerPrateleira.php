<?php 
class ControllerPrateleira{
    
    private $PrateleiraDAO;
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Prateleira.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/PrateleiraDAO.php');
        $this->PrateleiraDAO = new PrateleiraDAO();
    }
    
    public function buscarPrateleiraPorId(){
        $id = $_GET['id'];
        return $this->PrateleiraDAO->selectById($id);
        
    }
    public function buscarPrateleira(){
        $id = $_GET['id'];
        return $this->PrateleiraDAO->selectAll($id);

    }
}
?>
