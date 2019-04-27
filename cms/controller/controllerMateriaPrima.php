<?php 
class ControllerMateriaPrima{
    
    private $MateriaPrimaDAO;
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/MateriaPrima.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/ProdutoMateriaPrima.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/MateriaPrimaDAO.php');
        $this->MateriaPrimaDAO = new MateriaPrimaDAO();
    }
    public function buscarMateriaPrimaPorId(){
        $id = $_GET['id'];
        return $this->MateriaPrimaDAO->selectById($id);
        
    }
    public function buscarMateriaPrima(){
        return $this->MateriaPrimaDAO->selectMateriaPrima();
    }
    public function buscarEmbalagem(){
        return $this->MateriaPrimaDAO->selectEmbalagem();
    }

}
?>