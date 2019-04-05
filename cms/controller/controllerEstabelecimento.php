<?php 

class ControllerEstabelecimento{
    
    private $EstabelecimentoDAO;
    
    public function __construct(){
        
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/model/Estabelecimento.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/EstabelecimentoDAO.php');
        
        $this->EstabelecimentoDAO = new EstabelecimentoDAO();
    }
    
    
    
    public function ativarEstabelecimento() {
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];
            
            $Estabelecimento = new Estabelecimento();
            
            $Estabelecimento->setId($id);
            $Estabelecimento->setAtivo($ativo);
            
            $this->EstabelecimentoDAO->updateAtivo($Estabelecimento);
        }
    }
    
    
     public function buscarEstabelecimento() {
    
        return $this->EstabelecimentoDAO->selectAll();
    }
}

?>