<?php 
class ControllerPromocao{
    
    private $PromocaoDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/usuario" . "/model/PromocaoUsuario.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/usuario" .'/dao/PromocaoUsuarioDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/usuario" .'/view/components/imagem.php');
        $this->PromocaoDAO = new PromocaoUsuarioDAO();
    }
    
    public function buscarPromocaoPorId(){
    }
    public function buscarPromocoes(){
    }

    public function participarPromocao(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $idPromo = $_POST['id_promocao'];
            $idUsuario = $_POST['id_usuario'];

            $PromoUsu = new PromocaoUsuario();
            $PromoUsu->setIdPromocao($idPromo);
            $PromoUsu->setIdUsuario($idUsuario);
            $this->PromocaoDAO->insert($PromoUsu);
        }

    }
}
?>