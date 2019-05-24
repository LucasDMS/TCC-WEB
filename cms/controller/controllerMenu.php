<?php 
class ControllerMenu{
    
    private $MenuDAO;
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/MenuFuncionario.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" .'/dao/MenuDAO.php');
        $this->MenuDAO = new MenuDAO();
    }
    

    public function ativarMenu() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Menu = new MenuFuncionario(); 

            $Menu->setId($id);
            $Menu->setAtivo($ativo);
            
            $this->MenuDAO->updateAtivo($Menu);
        }
    }
    
    public function buscarMenuPorId(){
        $id = $_GET['id'];
        return $this->MenuDAO->selectById($id);
        
    }
    public function buscarMenu(){
        return $this->MenuDAO->selectAll();
    }
    public function buscarFuncionarioPermissoes(){
        $id = $_SESSION['id'];
        return $this->MenuDAO->selectByPermission($id);
    }
}
?>