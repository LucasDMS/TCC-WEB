<?php 

class ControllerMVV{
    
    private $MVVDAO;
    
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/MVV.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/MVVDAO.php');

        $this->MVVDAO = new MVVDAO();
    }

    public function inserirMVV(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $texto   = $_POST['txtTexto'];
            $tipo_texto = $_POST['txtTipoTexto'];
            $ativo   = 1;
            $apagado = 0;

            $MVV = new MVV(); 
            $MVV->setTexto($texto);
            $MVV->setOrdem($ordem);
            $MVV->setAtivo($ativo);
            $MVV->setApagado($apagado);

            $this->MVVDAO->insert($MVV);
        }
    }

    public function atualizarMVV() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $texto  = $_POST['txt_texto'];            
            $MVV = new MVV(); 

            $MVV->setId($id);
            $MVV->setTexto($texto);
            
            $this->MVVDAO->update($MVV);
        }
    }

    public function ativarMVV() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $MVV = new MVV(); 

            $MVV->setId($id);
            $MVV->setAtivo($ativo);
            
            $this->MVVDAO->updateAtivo($MVV);
        }
    }

    public function excluirMVV() {

        $id = $_POST['id'];

        $this->MVVDAO->delete($id);
    }
    
    public function buscarMVVPorId() {

        $id = $_GET['id'];

        return $this->MVVDAO->selectById($id);
    }

    public function buscarHistoras() {

        return $this->MVVDAO->selectAll();
    }
}

?>