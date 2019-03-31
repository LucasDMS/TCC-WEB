<?php 

class controllerSessao{
    
    private $sessaoDAO;
    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/sessaoClass.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/DAO/sessaoDAO.php");
        $this->sessaoDAO = new sessaoDAO();
    }

    public function logar(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $login = $_POST['txt_login'];
            $senha = $_POST['txt_senha'];

            $sessaoClass = new Sessao();
            
            $sessaoClass->setLogin($login);
            $sessaoClass->setSenha($senha);

            $this->sessaoDAO->select($sessaoClass);
        }
    }
}

?>