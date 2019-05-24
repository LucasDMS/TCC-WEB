<?php

/* 
    Projeto: MVC páginas Sobre Nos.
    Autor: Kelvin
    Data Criação: 08/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: controller da página Sobre Nos.
*/

class ControllerSobreNos{
    
    private $SobreNosDAO;

    public function __construct()
    {
    
        //Import do Sobre Nos
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/SobreNos.php");
    
        //Import do Sobre NosDAO, para inserir no BD
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" .'/dao/SobreNosDAO.php');
        
        //Instancia Sobre NosDAO
        $this->SobreNosDAO = new SobreNosDAO();
    }

        public function inserirSobreNos(){

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            
            $titulo  = $_POST['txt_titulo'];
            $texto   = $_POST['txt_texto'];
            $ordem   = 1;
            $ativo   = 1;
            $apagado = 0;

            $SobreNos = new SobreNos();
            
            $SobreNos->setTitulo($titulo);
            $SobreNos->setTexto($texto);
            $SobreNos->setOrdem($ordem);
            $SobreNos->setAtivo($ativo);
            $SobreNos->setApagado($apagado);

            $this->SobreNosDAO->insert($SobreNos);
        }
    }

        public function atualizarSobreNos() {

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id     = $_POST['id'];
            $titulo  = $_POST['txt_titulo']; 
            $texto  = $_POST['txt_texto']; 
            
            $SobreNos = new SobreNos();
            
            $SobreNos->setId($id);
            $SobreNos->setTitulo($titulo);
            $SobreNos->setTexto($texto);
            
            $this->SobreNosDAO->update($SobreNos);
        }
    }

        public function ativarSobreNos() {

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $SobreNos = new SobreNos(); 

            $SobreNos->setId($id);
            $SobreNos->setAtivo($ativo);
            
            $this->SobreNosDAO->updateAtivo($SobreNos);
        }
    }

        public function excluirSobreNos() 
        {

            $id = $_POST['id'];

            $this->SobreNosDAO->delete($id);
        }

        public function buscarSobreNosPorId() 
        {

            $id = $_GET['id'];

            return $this->SobreNosDAO->selectById($id);
        }

        public function buscarSobreNos() {
        
            return $this->SobreNosDAO->selectAll();
        }
    }
        
    