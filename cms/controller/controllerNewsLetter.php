<?php 

class ControllerNewsLetter{
    
    private $NewLetterDAO;
    
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/NewsLetter.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/NewsLetterDAO.php');

        $this->NewLetterDAO = new NewsLetterDAO();
    }
    public function inserirNewsLetter(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $email  = $_POST['txtNewsLetter'];

            $NewsLetter = new NewsLetter(); 
            $NewsLetter->setNewLetter($email);

            $this->NewLetterDAO->insert($NewsLetter);
        }
    }


    public function listarNewsLetter() {

        return $this->NewLetterDAO->selectAll();
    }
}

?>