<?php 
class ControllerFuncionario{
    
    private $FuncionarioDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Funcionario.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Sessao.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/MenuFuncionario.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/FuncionarioDAO.php');
        $this->FuncionarioDAO = new FuncionarioDAO();
    }
    public function inserirFuncionario(){
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
            $idMenu = $_POST['checkbox'];
            
            $Sessao = new Sessao(); 
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);
            $Sessao->setTipo($tipo);

            $Funcionario = new Funcionario();
            $Funcionario->setNome($nome);
            $Funcionario->setCargo($cargo);
            $Funcionario->setSetor($setor);
            $Funcionario->setDataEmissao($data_emissao);
            $Funcionario->setAtivo($ativo);

            $MenuFuncionario = new MenuFuncionario();
            $MenuFuncionario->setIdMenu($idMenu);
            $MenuFuncionario->setIdFuncionario($id);
            var_dump($idMenu);
            $this->FuncionarioDAO->insert($Funcionario, $Sessao, $MenuFuncionario);
        }
    }
    public function atualizarFuncionario(){
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

           

            $Funcionario = new Funcionario(); 
            $Sessao = new Sessao(); 
            $Funcionario->setId($id);
            $Funcionario->setNome($nome);
            $Funcionario->setCargo($cargo);
            $Funcionario->setSetor($setor);
            $Funcionario->setDataEmissao($data_emissao);

            $Sessao->setId($idAutenticacao);
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);
            $Sessao->setTipo($tipo);

            $this->FuncionarioDAO->update($Funcionario, $Sessao);
        }
    }

    public function ativarFuncionario() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Funcionario = new Funcionario(); 

            $Funcionario->setId($id);
            $Funcionario->setAtivo($ativo);
            
            $this->FuncionarioDAO->updateAtivo($Funcionario);
        }
    }
    
    public function buscarFuncionarioPorId(){
        $id = $_GET['id'];
        return $this->FuncionarioDAO->selectById($id);
    }
    public function buscarFuncionario(){
        return $this->FuncionarioDAO->selectAll();
    }
}
?>