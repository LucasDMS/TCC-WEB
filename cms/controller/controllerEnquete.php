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

    //função para enviar os dados para DAO para ativar e desativar
    public function ativarEnquete(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];

            echo $id. "== ". $ativo."aaa";
            
            $enquete = new Enquete();
            $enquete->setId($id);
            $enquete->setStatus($ativo);

            $this->EnqueteDAO->updateAtivo($enquete);

        }

    }


    //respostas
    public function listarEnquete(){
        return $this->EnqueteDAO->selectResposta();
    }

    //perguntas
    public function listarPerguntas(){
        return $this->EnqueteDAO->selectPerguntas();
    }

    //buscar enquete por id
    public function buscarEnquetePorId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            return $this->EnqueteDAO->selectById($id);

        }
    }

    public function buscarPerguntaPorId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            return $this->EnqueteDAO->selectByIdPergunta($id);

        }
    }

    //excluir enquete
    public function excluirEnquete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $this->EnqueteDAO->delete($id);
        }

    }

    public function atualizarEnquete(){
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $pergunta = $_POST['txt_pergunta'];
            $resposta = $_POST['txt_resposta'];
            $data = $_POST['date'];

            $enquete = new Enquete();
            $enquete->setId($id);
            $enquete->setPergunta($pergunta);
            $enquete->setResposta($resposta);
            $enquete->setData($data);
            $this->EnqueteDAO->update($enquete);
        }
    }


}

?>