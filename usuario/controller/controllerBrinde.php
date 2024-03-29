<?php

class ControllerBrinde{

    private $BrindeDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/usuario" . "/model/Brinde.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/tcc/usuario" . "/dao/BrindeDAO.php");
        $this->BrindeDAO = new BrindeDAO();
    }
    public function inserirBrinde(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $idUsuario = $_POST['ativo'];
            $Brinde = new Brinde();
            $Brinde->setId($id);
            $Brinde->setUsuario($idUsuario);
            $this->BrindeDAO->insert($Brinde);
        }
    }
    public function atualizarBrinde(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            
            $Brinde = new Brinde();
            
            $Brinde->setId($id);
            $Brinde->setNome($nome);
            $Brinde->setDescricao($descricao);

            $this->BrindeDAO->update($Brinde);
        }
    }

    public function excluirBrinde(){
        $id = $_POST['id'];
        $this->BrindeDAO ->delete($id);
    }

    public function ativarBrinde() {
        
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $ativo = $_POST['ativo'];

            $Brinde = new Brinde();

            $Brinde->setId($id);
            $Brinde->setAtivo($ativo);

            $this->BrindeDAO->updateAtivo($Brinde);
        }
    }
    
    public function buscarBrindePorId(){
        $id = $_GET['id'];
        return $this->BrindeDAO->selectById($id);
    }
    public function buscarBrindes(){
        return $this->BrindeDAO->selectAll();
    }
}
?>