<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de contatos
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
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Eventos.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/EventosDAO.php");
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

    }

    public function excluirEventos(){

    }

    public function ativarEventos(){
        
    }

    public function buscarEventosPorId(){

    }

    public function listarEventos(){
        return $this->EventosDAO->selectAll();
    }





}

?>