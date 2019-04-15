<?php 
class ControllerMenu{
    
    private $MenuDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Menu.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/MenuFuncionario.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/MenuDAO.php');
        $this->MenuDAO = new MenuDAO();
    }
    public function inserirMenu(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $nome =$_POST['txtNome'];
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPassword'];
            $tipo = $_POST['txtTipo'];
            $cargo  = $_POST['txtCargo'];
            $setor = $_POST['txtSetor'];
            $data_emissao  = $_POST['txtDtEmissao'];
            $ativo = 1;
            
            $Menu = new Menu();
            $Sessao = new Sessao(); 
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);
            $Sessao->setTipo($tipo);
            $Menu->setNome($nome);
            $Menu->setCargo($cargo);
            $Menu->setSetor($setor);
            $Menu->setDataEmissao($data_emissao);
            $Menu->setAtivo($ativo);
            $this->MenuDAO->insert($Menu, $Sessao);
        }
    }
    public function atualizarMenu(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $idAutenticacao = $_POST['idAutenticacao'];
            $nome =$_POST['txtNome'];
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPassword'];
            $tipo = $_POST['txtTipo'];
            $cargo  = $_POST['txtCargo'];
            $setor = $_POST['txtSetor'];
            $data_emissao  = $_POST['txtDtEmissao'];

           

            $Menu = new Menu(); 
            $Sessao = new Sessao(); 
            $Menu->setId($id);
            $Menu->setNome($nome);
            $Menu->setCargo($cargo);
            $Menu->setSetor($setor);
            $Menu->setDataEmissao($data_emissao);
            
            $Sessao->setId($idAutenticacao);
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);
            $Sessao->setTipo($tipo);

            $this->MenuDAO->update($Menu, $Sessao);
        }
    }

    public function ativarMenu() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Menu = new Menu(); 

            $Menu->setId($id);
            $Menu->setAtivo($ativo);
            
            $this->MenuDAO->updateAtivo($Menu);
        }
    }
    
    public function buscarMenuPorId(){
        $id = $_GET['id'];
        return $this->MenuDAO->selectById($id);
        
    }
    public function buscarMenu(){
        return $this->MenuDAO->selectAll();
    }
}
?>