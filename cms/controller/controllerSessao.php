<?php 
class ControllerSessao{
    
    private $SessaoDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Sessao.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/dao/SessaoDAO.php");
        $this->SessaoDAO = new SessaoDAO();
    }
    public function logar(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $login = $_POST['txt_login'];
            $senha = $_POST['txt_senha'];
            $Sessao = new Sessao();
            
            $Sessao->setLogin($login);
            $Sessao->setSenha($senha);
    
            $this->SessaoDAO->select($Sessao);
        }
    }
    public function buscarFuncionarioPorId(){
        $id = $_GET['id'];
        return $this->SessaoDAO->selectByIdFuncionario($id);
    }
    public function buscarUsuarioPorId(){
        $id = $_GET['id'];
        return $this->SessaoDAO->selectByIdUsuario($id);
    }

    public function verificarUsuario(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $usuario = $_POST['txtLogin'];

            $Sessao = new Sessao();
            $Sessao->setLogin($usuario);
            $this->SessaoDAO->selectVerify($Sessao);
        }
    }
}
?>