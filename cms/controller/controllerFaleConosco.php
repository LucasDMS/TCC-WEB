<?php 

class ControllerFaleConosco{
    
    private $FaleConoscoDAO;
    
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/FaleConosco.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/FaleConoscoDAO.php');

        $this->FaleConoscoDAO = new FaleConoscoDAO();
    }

    public function inserirFaleConosco(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $nome   = $_POST['txtNome'];
            $email  = $_POST['txtEmail'];
            $celular  = $_POST['txtNome'];
            $telefone  = $_POST['txtEmail'];
            $estado   = $_POST['txtNome'];
            $cidade  = $_POST['txtEmail'];
            $texto   = $_POST['txtTexto'];

            $FaleConosco = new FaleConosco(); 
            $FaleConosco->setNome($nome);
            $FaleConosco->setEmail($email);
            $FaleConosco->setCelular($celular);
            $FaleConosco->setTelefone($telefone);
            $FaleConosco->setEstado($estado);
            $FaleConosco->setCidade($cidade);
            $FaleConosco->setTexto($texto);
            $this->FaleConoscoDAO->insert($FaleConosco);
        }
    }


    public function ativarFaleConosco() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id      = $_POST['id'];
            $status  = $_POST['ativo'];
            
            $FaleConosco = new FaleConosco(); 

            $FaleConosco->setId($id);
            $FaleConosco->setStatus($status);
            
            $this->FaleConoscoDAO->updateAtivo($FaleConosco);
        }
    }

    public function buscarFaleConoscoPorId() {

        $id = $_GET['id'];

        return $this->FaleConoscoDAO->selectById($id);
    }

    public function buscarFaleConosco() {

        return $this->FaleConoscoDAO->selectAll();
    }
}

?>