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
            $status = 1;
            $apagado = 0;

            $Videos = new Videos();
            $Videos->setTitulo($titulo);
            $Videos->setLink($video);
            $Videos->setStatus($status);
            $Videos->setApagado($apagado);

            $this->VideosDAO->inserir($Videos);
        }
    }

    public function excluirVideos(){
        $id = $_POST['id'];
        $this->VideosDAO->delete($id);
    }

    public function atualizarVideos(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $titulo = $_POST['txt_titulo'];
            $link = $_POST['txt_video'];

            $Videos = new Videos();

            $Videos->setId($id);
            $Videos->setTitulo($titulo);
            $Videos->setLink($link);

            $this->VideosDAO->update($Videos);
        }
    }

    public function buscarVideosPorId(){
        $id = $_GET['id'];
        return $this->VideosDAO->selectById($id);
    }

    public function ativarVideos(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];
            $Videos = new Videos();

            $Videos->setId($id);
            $Videos->setStatus($ativo);
            echo $Videos->getStatus();

            $this->VideosDAO->updateAtivo($Videos);
        }
    }
}


?>