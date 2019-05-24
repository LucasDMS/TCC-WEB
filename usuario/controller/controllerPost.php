<?php
/*
    Projeto: TCC
    Autor: Rafael
    Data Criação: 24/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: class que controla os dados.
*/
class ControllerPost{

    private $PostDAO;

    public function __construct(){

        require_once($_SERVER['DOCUMENT_ROOT'] . '/usuario/' . 'dao/PostDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/usuario/' . 'model/Post.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/cms/' . 'view/components/imagem.php');

        $this->PostDAO = new PostDAO();
    }

    public function buscarPosts(){
        return $this->PostDAO->selectAll();
    }
}

?>