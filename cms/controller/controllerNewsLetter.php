<?php 

class ControllerNewsLetter{
    
    private $NewLetterDAO;
    
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/NewsLetter.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/NewsLetterDAO.php');

        $this->NewLetterDAO = new NewsLetterDao();
    }
  
    public function ativarHistoria() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $NewLetter = new NewLetter(); 

            $NewLetter->setId($id);
            $NewLetter->setAtivo($ativo);
            
            $this->NewLetterDAO->updateAtivo($NewLetter);
        }
    }



    public function listarNewsLetter() {

        return $this->NewLetterDAO->selectAll();
    }
}

?>