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
}
?>