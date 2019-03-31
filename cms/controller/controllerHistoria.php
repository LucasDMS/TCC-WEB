<?php 

class ControllerHistoria{
    
    private $HistoriaDAO;
    
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Historia.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/HistoriaDAO.php');

        $this->HistoriaDAO = new HistoriaDAO();
    }

    public function inserirHistoria(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $texto  = $_POST['txt_texto'];
            $status = 1;
            $ordem  = 1;

            $Historia = new Historia(); 
            $Historia->setTexto($texto);
            $Historia->setStatus($status);
            $Historia->setOrdem($ordem);

            $this->HistoriaDAO->insert($Historia);
        }
    }

    public function atualizarHistoria() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_GET['id_historia'];
            $texto  = $_POST['txt_texto'];
            $status = $_POST['txt_status'];
            $ordem  = $_POST['txt_ordem'];
            
            $Historia = new Historia(); 

            $Historia->setId($id);
            $Historia->setTexto($texto);
            $Historia->setStatus($status);
            $Historia->setOrdem($ordem);
            
            $this->HistoriaDAO->update($Historia);
        }
    }

    public function excluirHistoria() {

        $id = $_GET['id_historia'];

        $this->HistoriaDAO->delete($id);
    }
    
    public function buscarHistoriaPorId() {

        $id = $_GET['id_historia'];

        return $this->HistoriaDAO->selectById($id);
    }

    public function buscarHistoras() {

        return $this->HistoriaDAO->selectAll();
    }
}

?>