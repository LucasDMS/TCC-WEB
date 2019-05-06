<?php
class ControllerCores{

    private $CoresDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/model/Cores.php");
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . '/dao/CoresDAO.php');
        $this->CoresDAO = new CoresDAO();
    }
    public function inserirCores(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $cores = $_POST['txtCores'];
            $tipo_cores = $_POST['txtTipoCores'];

            $Cores = new Cores();
            $Cores->setCores($cores);
            $Cores->setTipoCores($tipo_cores);
            $this->CoresDAO->insert($Cores);
        }
    }

    public function atualizarCores(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $cores = $_POST['txtCores'];
            $tipo_cores = $_POST['txtTipoCores'];
            $Cores = new Cores(); 
            $Cores->setId($id);
            $Cores->setCores($cores);
            $Cores->setTipoCores($tipo_cores);
            $this->CoresDAO->update($Cores);

        }
    }

    public function buscarCoresPorId(){

        $id = $_GET['id'];

        return $this->CoresDAO->selectById($id);
    }

    public function buscarCores() {

        return $this->CoresDAO->selectAll();
    }
}
?>