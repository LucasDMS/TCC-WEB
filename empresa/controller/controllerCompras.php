<?php 
class ControllerCompras{
    
    private $ComprasDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" .'/dao/ComprasDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" .'/model/Compras.php');
        $this->ComprasDAO = new ComprasDAO();
        
    }
    public function inserirUsuarioEstabelecimento(){
    
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