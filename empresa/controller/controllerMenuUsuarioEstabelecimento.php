<?php 
class ControllerMenuUsuarioEstabelecimento{
    
    private $MenuDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/model/MenuUsuarioEstabelecimento.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" .'/dao/MenuUsuarioEstabelecimentoDAO.php');
        $this->MenuUsuarioEstabelecimentoDAO = new MenuUsuarioEstabelecimentoDAO();
    }
    

    public function ativarMenu() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Menu = new Menu(); 

            $Menu->setId($id);
            $Menu->setAtivo($ativo);
            
            $this->MenuDAO->updateAtivo($Menu);
        }
    }
    
    public function buscarMenuPorId(){
        $id = $_GET['id'];
        return $this->MenuUsuarioEstabelecimentoDAO->selectById($id);
        
    }
    public function buscarMenu(){
        return $this->MenuUsuarioEstabelecimentoDAO->selectAll();
    }
    public function buscarUsuarioPermissoes(){
        $id = $_SESSION['id'];
        return $this->MenuUsuarioEstabelecimentoDAO->selectByPermission($id);
    }
}
?>