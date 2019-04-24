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

class controllerEnquete{
    private $EnqueteDAO;

    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Enquete.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/EnqueteDAO.php");
        $this->EnqueteDAO = new EnqueteDAO();

    }

    public function inserirEnquete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $pergunta = $_POST['txt_pergunta'];
            $resposta = $_POST['txt_resposta'];
            $data = $_POST['date'];

            $enquete = new Enquete();
            $enquete->setPergunta($pergunta);
            $enquete->setResposta($resposta);
            $enquete->setData($data);
            $enquete->setStatus(1);

            $this->EnqueteDAO->inserirEnquete($enquete);


        }

    }

    public function listarEnquete(){
        return $this->EnqueteDAO->selectAll();
    }


    public function buscarEnquetePorId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            return $this->EnqueteDAO->selectById($id);

        }

    }


}

?>