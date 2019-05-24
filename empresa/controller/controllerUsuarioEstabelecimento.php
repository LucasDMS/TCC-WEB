<?php 
class ControllerUsuarioEstabelecimento{
    
    private $UsuarioEstabelecimentoDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/empresa" . "/model/UsuarioEstabelecimento.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/Sessao.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/dao/SessaoDAO.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerSessao.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/empresa" . "/model/MenuUsuarioEstabelecimento.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/empresa" .'/dao/UsuarioEstabelecimentoDAO.php');
        $this->UsuarioEstabelecimentoDAO = new UsuarioEstabelecimentoDAO();
        
    }
    public function inserirUsuarioEstabelecimento(){
        session_start();
        $id = $_SESSION['id'];
    
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $nome =$_POST['txtNome'];
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPassword'];
            $tipo = 'EMPRESA';
            $ativo = 1;
            $idMenu = $_POST['checkbox'];
            
            $Sessao = new Sessao(); 
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);
            $Sessao->setTipo($tipo);

            $UsuarioEstabelecimento = new UsuarioEstabelecimento();
            $UsuarioEstabelecimento->setNome($nome);
            $UsuarioEstabelecimento->setAtivo($ativo);
            $MenuUsuarioEstabelecimento = new MenuUsuarioEstabelecimento();
            $MenuUsuarioEstabelecimento->setIdMenu($idMenu);
            return $this->UsuarioEstabelecimentoDAO->insert($UsuarioEstabelecimento, $Sessao, $MenuUsuarioEstabelecimento, $id);
        }
    }
    public function atualizarUsuarioEstabelecimento(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $idAutenticacao = $_POST['idAutenticacao'];
            $nome =$_POST['txtNome'];
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPassword'];
            $ativo = 1;
            $idMenu = $_POST['checkbox'];

            $UsuarioEstabelecimento = new UsuarioEstabelecimento(); 
            $Sessao = new Sessao(); 
            $MenuUsuarioEstabelecimento = new MenuUsuarioEstabelecimento();

            $UsuarioEstabelecimento->setId($id);
            $UsuarioEstabelecimento->setNome($nome);
            $UsuarioEstabelecimento->setAtivo($ativo);

            $Sessao->setId($idAutenticacao);
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);

            $MenuUsuarioEstabelecimento->setIdUsuario($id);
            $MenuUsuarioEstabelecimento->setIdMenu($idMenu);
        
            $this->UsuarioEstabelecimentoDAO->update($UsuarioEstabelecimento, $Sessao, $MenuUsuarioEstabelecimento);


            
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
    
    public function buscarUsuarioEstabelecimentoPorId(){
        $id = $_GET['id'];
        return $this->UsuarioEstabelecimentoDAO->selectById($id);
    }
    public function buscarUsuarioEstabelecimento(){
        session_start();
        $id = $_SESSION['id'];
        return $this->UsuarioEstabelecimentoDAO->selectAll($id);
    }
    public function buscarUsuarioPermissoes(){
        session_start();
        $id = $_SESSION['id'];
        return $this->UsuarioEstabelecimentoDAO->selectByPermission($id);
    }

}
?>