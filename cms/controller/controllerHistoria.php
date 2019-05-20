<?php 

class ControllerHistoria{
    
    private $HistoriaDAO;
    
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/model/Historia.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" .'/dao/HistoriaDAO.php');

        $this->HistoriaDAO = new HistoriaDAO();
    }

    public function inserirHistoria(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $texto   = $_POST['txt_texto'];
            $ordem   = 1;
            $ativo   = 1;
            $apagado = 0;

            $Historia = new Historia(); 
            $Historia->setTexto($texto);
            $Historia->setOrdem($ordem);
            $Historia->setAtivo($ativo);
            $Historia->setApagado($apagado);

            $this->HistoriaDAO->insert($Historia);
        }
    }

    public function atualizarHistoria() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $texto  = $_POST['txt_texto'];            
            $Historia = new Historia(); 

            $Historia->setId($id);
            $Historia->setTexto($texto);
            
            $this->HistoriaDAO->update($Historia);
        }
    }

    public function ativarHistoria() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Historia = new Historia(); 

            $Historia->setId($id);
            $Historia->setAtivo($ativo);
            
            $this->HistoriaDAO->updateAtivo($Historia);
        }
    }

    public function excluirHistoria() {

        $id = $_POST['id'];

        $this->HistoriaDAO->delete($id);
    }
    
    public function buscarHistoriaPorId() {

        $id = $_GET['id'];

        return $this->HistoriaDAO->selectById($id);
    }

    public function buscarHistoras() {

        return $this->HistoriaDAO->selectAll();
    }
}

?>