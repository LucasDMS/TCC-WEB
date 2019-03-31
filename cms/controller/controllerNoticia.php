<?php 

class ControllerHistoria{
    
    private $NoticiaDAO;

    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Noticia.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/NoticiaDAO.php');

        $this->NoticiaDAO = new NoticiaDAO();
    }

    public function inserirHistoria(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){

        }
    }

    public function atualizarHistoria(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

        }
    }

    public function excluirHistoria(){
        $id = $_POST['id'];
        $this->historiaDAO ->delete($id);
    }
    
    public function buscarHistoriaPorId(){
        $id = $_POST['id'];
        return $this->historiaDAO->selectById($id);
    }

    public function buscarHistoras(){

        return $this->historiaDAO->selectAll();
    }
}
?>