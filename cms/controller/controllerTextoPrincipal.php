<?php 

class ControllerTextoPrincipal{
    
    private $TextoPrincipalDAO;
    
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/TextoPrincipal.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/TextoPrincipalDAO.php');

        $this->TextoPrincipalDAO = new TextoPrincipalDAO();
    }

    public function atualizarTextoPrincipal(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id     = $_POST['id']; 
            $texto   = $_POST['txtTexto'];
            $titulo   = $_POST['txtTitulo'];
            $tipo_texto  = $_POST['txtTipoTexto'];

            $TextoPrincipal = new TextoPrincipal(); 
            $TextoPrincipal->setId($id);
            $TextoPrincipal->setTitulo($titulo);
            $TextoPrincipal->setTexto($texto);
            $TextoPrincipal->setTipoTexto($tipo_texto);
            $this->TextoPrincipalDAO->update($TextoPrincipal);
        }
    }

    public function buscarTextoPrincipalPorId() {

        $id = $_GET['id'];

        return $this->TextoPrincipalDAO->selectById($id);
    }

    public function buscarTextoPrincipal() {

        return $this->TextoPrincipalDAO->selectAll();
    }
}

?>