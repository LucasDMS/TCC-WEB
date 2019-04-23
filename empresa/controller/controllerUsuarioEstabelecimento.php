<?php 
class ControllerUsuarioEstabelecimento{
    
    private $UsuarioEstabelecimentoDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" . "/model/UsuarioEstabelecimento.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Sessao.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" . "/model/MenuUsuarioEstabelecimento.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" .'/dao/UsuarioEstabelecimentoDAO.php');
        $this->UsuarioEstabelecimentoDAO = new UsuarioEstabelecimentoDAO();
    }
    public function inserirUsuarioEstabelecimento(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $nome =$_POST['txtNome'];
            $login = $_POST['txtLogin'];
            $password = $_POST['txtPassword'];
            $tipo = 'Funcionario Estabelecimento';
            $ativo = 1;
            $idMenu = $_POST['checkbox'];
            
            $Sessao = new Sessao(); 
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);
            $Sessao->setTipo($tipo);

            $UsuarioEstabelecimento = new UsuarioEstabelecimento();
            $UsuarioEstabelecimento->setNome($nome);
            $UsuarioEstabelecimento->setAtivo($ativo);
            $UsuarioEstabelecimento->setIdMenu($idMenu);
     
            return $this->UsuarioEstabelecimentoDAO->insert($UsuarioEstabelecimento, $Sessao);
        }
    }
    public function atualizarUsuarioEstabelecimento(){
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
            $idMenu = $_POST['checkbox'];

           

            $UsuarioEstabelecimento = new UsuarioEstabelecimento(); 
            $Sessao = new Sessao(); 
            $MenuUsuarioEstabelecimento = new MenuUsuarioEstabelecimento();

            $UsuarioEstabelecimento->setId($id);
            $UsuarioEstabelecimento->setNome($nome);
            $UsuarioEstabelecimento->setCargo($cargo);
            $UsuarioEstabelecimento->setSetor($setor);
            $UsuarioEstabelecimento->setDataEmissao($data_emissao);

            $Sessao->setId($idAutenticacao);
            $Sessao->setLogin($login);
            $Sessao->setSenha($password);
            $Sessao->setTipo($tipo);

            $MenuUsuarioEstabelecimento->setIdUsuarioEstabelecimento($id);
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
        return $this->UsuarioEstabelecimentoDAO->selectAll();
    }
}
?>