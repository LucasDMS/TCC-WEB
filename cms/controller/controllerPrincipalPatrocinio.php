<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: controller de texto principal de patrocinio
    */
class ControllerPrincipalPatrocinio{
    private $PrincipalPatrocinioDAO;    

    private $texto = null;
    


    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Principal_patrocinio.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/PrincipalPatrocinioDAO.php");
        $this->PrincipalPatrocinioDAO = new PrincipalPatrocinioDAO();
        
    }

    public function inserirPrincipalPatrocinio(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $texto = $_POST['txt_texto'];
            $status = 1;
            $apagado = 0;
            $tipo_texto = 'patrocinio';
            $PrincipalPatrocinio = new Principal_patrocinio();
            $PrincipalPatrocinio->setTexto($texto);
            $PrincipalPatrocinio->setApagado($apagado);
            $PrincipalPatrocinio->setStatus($status);
            $PrincipalPatrocinio->setTipo_texto($tipo_texto);
    
            $this->PrincipalPatrocinioDAO->inserir($PrincipalPatrocinio);
        }
    }

    public function atualizarPrincipalPatrocinio(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $texto = $_POST['txt_texto'];

            $PrincipalPatrocinio = new Principal_patrocinio();
            $PrincipalPatrocinio->setTexto($texto);
            $PrincipalPatrocinio->setId($id);

            $this->PrincipalPatrocinioDAO->update($PrincipalPatrocinio);
        }
    }

    public function excluirPrincipalPatrocinio(){
        $id = $_POST['id'];
        $this->PrincipalPatrocinioDAO->delete($id);
    }

    public function ativarPrincipalPatrocinio(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];

            $PrincipalPatrocinio = new Principal_patrocinio();

            $PrincipalPatrocinio->setId($id);
            $PrincipalPatrocinio->setStatus($ativo);

            $this->PrincipalPatrocinioDAO->updateAtivo($PrincipalPatrocinio);
        }
    }

    public function buscarPrincipalPatrocinioPorId(){
        $id = $_GET['id'];
        return $this->PrincipalPatrocinioDAO->selectById($id);
    }

    public function listarPrincipalPatrocinio(){
        return $this->PrincipalPatrocinioDAO->selectAll();
    }





}

?>