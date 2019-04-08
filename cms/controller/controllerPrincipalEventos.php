<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: controller de texto principal de eventos
    */
class ControllerPrincipalEventos{
    private $PrincipalEventosDAO;    

    private $texto = null;
    


    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Principal_eventos.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/PrincipalEventosDAO.php");
        $this->PrincipalEventosDAO = new PrincipalEventosDAO();
        
    }

    public function inserirPrincipalEventos(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $texto = $_POST['txt_texto'];
            $status = 1;
            $apagado = 0;
            $tipo_texto = 'eventos';
            $PrincipalEventos = new Principal_eventos();
            $PrincipalEventos->setTexto($texto);
            $PrincipalEventos->setApagado($apagado);
            $PrincipalEventos->setStatus($status);
            $PrincipalEventos->setTipo_texto($tipo_texto);

            $this->PrincipalEventosDAO->inserir($PrincipalEventos);
        }
    }

    public function atualizarPrincipalEventos(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $texto = $_POST['txt_texto'];

            $PrincipalEventos = new Principal_eventos();
            $PrincipalEventos->setTexto($texto);
            $PrincipalEventos->setId($id);

            $this->PrincipalEventosDAO->update($PrincipalEventos);
        }
    }

    public function excluirPrincipalEventos(){
        $id = $_POST['id'];
        $this->PrincipalEventosDAO->delete($id);
    }

    public function ativarPrincipalEventos(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];

            $PrincipalEventos = new Principal_eventos();

            $PrincipalEventos->setId($id);
            $PrincipalEventos->setStatus($ativo);

            $this->PrincipalEventosDAO->updateAtivo($PrincipalEventos);
        }
    }

    public function buscarPrincipalEventosPorId(){
        $id = $_GET['id'];
        return $this->PrincipalEventosDAO->selectById($id);
    }

    public function listarPrincipalEventos(){
        return $this->PrincipalEventosDAO->selectAll();
    }





}

?>