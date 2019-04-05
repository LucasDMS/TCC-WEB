<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 05/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: controller de videos

    */

class ControllerVideos{
    private $VideosDAO;

    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/model/Videos.php");
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/VideosDAO.php");
        $this->VideosDAO = new VideosDAO();
    }

    public function listarVideos(){
        return $this->VideosDAO->selectAll();
    }

    public function inserirVideos(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $titulo = $_POST['txt_titulo'];
            $video = $_POST['txt_video'];

            $Videos = new Videos();
            $Videos.setTitulo($titulo);
            $Videos.setLink($video);

            $this->VideosDAO->inserir($Videos);
        }
    }


}


?>