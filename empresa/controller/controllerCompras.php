<?php 
class ControllerCompras{
    
    private $ComprasDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" .'/dao/ComprasDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" .'/model/Compras.php');
        $this->ComprasDAO = new ComprasDAO();
        
    }
    public function inserirCarrinho(){
    
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $idUsuario = $_POST['ativo'];
            
            $Compras = new Compras();
            $Compras->setId($id);
            $Compras->setUsuario($idUsuario);

            $this->ComprasDAO->inserir($Compras);
        }
    }
    

    public function ativarUsuarioEstabelecimento() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $UsuarioEstabelecimento = new UsuarioEstabelecimento(); 

            $UsuarioEstabelecimento->setId($id);
            $UsuarioEstabelecimento->setAtivo($ativo);
            
            $this->UsuarioEstabelecimentoDAO->updateAtivo($UsuarioEstabelecimento);
        }
    }
    
    public function buscarCompras(){
        return $this->ComprasDAO->selectAll();
    }

    public function buscarComprasId(){
        $id = $_GET['id'];
        return $this->ComprasDAO->selectById($id);
    }


}
?>