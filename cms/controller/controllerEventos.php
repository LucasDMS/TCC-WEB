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
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Eventos.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/EventosDAO.php");
        $this->EventosDAO = new EventosDAO();
    }

    public function inserirEventos(){

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