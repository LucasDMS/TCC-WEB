<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: controller de texto principal de video
    */
class ControllerPrincipalVideo{
    private $PrincipalVideoDAO;    

    private $texto = null;
    


    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Principal_video.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/PrincipalVideoDAO.php");
        $this->PrincipalVideoDAO = new PrincipalVideoDAO();
        
    }

    public function inserirPrincipalVideo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $texto = $_POST['txt_texto'];
            $status = 1;
            $apagado = 0;
            $tipo_texto = 'video';
            $PrincipalVideo = new Principal_video();
            $PrincipalVideo->setTexto($texto);
            $PrincipalVideo->setApagado($apagado);
            $PrincipalVideo->setStatus($status);
            $PrincipalVideo->setTipo_texto($tipo_texto);
    
            $this->PrincipalVideoDAO->inserir($PrincipalVideo);
        }
    }

    public function atualizarPrincipalVideo(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $texto = $_POST['txt_texto'];

            $PrincipalVideo = new Principal_video();
            $PrincipalVideo->setTexto($texto);
            $PrincipalVideo->setId($id);

            $this->PrincipalVideoDAO->update($PrincipalVideo);
        }
    }

    public function excluirPrincipalVideo(){
        $id = $_POST['id'];
        $this->PrincipalVideoDAO->delete($id);
    }

    public function ativarPrincipalVideo(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];

            $PrincipalVideo = new Principal_video();

            $PrincipalVideo->setId($id);
            $PrincipalVideo->setStatus($ativo);

            $this->PrincipalVideoDAO->updateAtivo($PrincipalVideo);
        }
    }

    public function buscarPrincipalVideoPorId(){
        $id = $_GET['id'];
        return $this->PrincipalVideoDAO->selectById($id);
    }

    public function listarPrincipalVideo(){
        return $this->PrincipalVideoDAO->selectAll();
    }





}

?>