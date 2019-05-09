<?php

class ControllerBrinde{

    private $BrindeDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT']."/_tcc/cms" . "/dao/BrindeDAO.php");
        $this->BrindeDAO = new BrindeDAO();
    }
    public function inserirBrinde(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $titulo = $_POST['txt_titulo'];
            $texto = $_POST['txt_conteudo'];
            $ativo = 1;
            $apagado = 0;

            $Brinde = new Brinde();
            $Brinde->setTitulo($titulo);
            $Brinde->setConteudo($texto);
            $Brinde->setApagado($apagado);
            $Brinde->setAtivo($ativo);
            $this->BrindeDAO->insert($Brinde);
        }
    }
    public function atualizarBrinde(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $titulo = $_POST['txt_titulo'];
            $conteudo = $_POST['txt_conteudo'];
            $Brinde = new Brinde();

            $Brinde->setId($id);
            $Brinde->setTitulo($titulo);
            $Brinde->setConteudo($conteudo);

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
    public function buscarBrinde(){
        return $this->BrindeDAO->selectAll();
    }
}
?>