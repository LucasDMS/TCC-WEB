<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: controller de eventoss
    */
class ControllerEventos{
    private $EventosDAO;    

    private $nome = null;
    private $descricao = null;
    private $data = null;
    private $estado = null;
    private $cidade = null;
    private $hora = null;
    private $status = null;


    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/Eventos.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/cms". "/dao/EventosDAO.php");
        $this->EventosDAO = new EventosDAO();
        
    }

    public function inserirEventos(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $data = $_POST['txt_date'];
            $estado = $_POST['txt_estado'];
            $cidade = $_POST['txt_cidade'];
            $hora = $_POST['txt_hora'];
            $status = 1;

            $Eventos = new Eventos();
            $Eventos->setNome($nome);
            $Eventos->setDescricao($descricao);
            $Eventos->setData($data);
            $Eventos->setEstado($estado);
            $Eventos->setCidade($cidade);
            $Eventos->setHora($hora);
            $Eventos->setStatus($status);

            $this->EventosDAO->inserir($Eventos);
        }
    }

    public function atualizarEventos(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $data = $_POST['txt_date'];
            $estado = $_POST['txt_estado'];
            $cidade = $_POST['txt_cidade'];
            $hora = $_POST['txt_hora'];

            $eventos = new Eventos();

            $eventos->setId($id);
            $eventos->setNome($nome);
            $eventos->setDescricao($descricao);
            $eventos->setData($data);
            $eventos->setEstado($estado);
            $eventos->setCidade($cidade);
            $eventos->setHora($hora);

            $this->EventosDAO->update($eventos);
        }
    }

    public function excluirEventos(){
        $id = $_POST['id'];
        $this->EventosDAO->delete($id);
    }

    public function ativarEventos(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];

            $Eventos = new Eventos();

            $Eventos->setId($id);
            $Eventos->setStatus($ativo);

            $this->EventosDAO->updateAtivo($Eventos);
        }
    }

    public function buscarEventosPorId(){
        $id = $_GET['id'];
        return $this->EventosDAO->selectById($id);
    }

    public function listarEventos(){
        return $this->EventosDAO->selectAll();
    }





}

?>