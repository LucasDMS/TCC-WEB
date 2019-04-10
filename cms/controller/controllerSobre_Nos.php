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

class ControllerSobre_Nos{
    
    private $Sobre_NosDAO;

    public function __construct()
    {
    
        //Import do Sobre Nos
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Sobre_Nos.php");
    
        //Import do Sobre NosDAO, para inserir no BD
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/Sobre_NosDAO.php');
        
        //Instancia Sobre NosDAO
        $this->Sobre_NosDAO = new Sobre_NosDAO();
    }

        public function inserirSobre_Nos(){

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            
            $titulo  = $_POST['txt_titulo'];
            $texto   = $_POST['txt_texto'];
            $ordem   = 1;
            $ativo   = 1;
            $apagado = 0;

            $Sobre_Nos = new Sobre_Nos();
            
            $Sobre_Nos->setTitulo($titulo);
            $Sobre_Nos->setTexto($texto);
            $Sobre_Nos->setOrdem($ordem);
            $Sobre_Nos->setAtivo($ativo);
            $Sobre_Nos->setApagado($apagado);

            $this->Sobre_NosDAO->insert($Sobre_Nos);
        }
    }

        public function atualizarSobre_Nos() {

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id     = $_POST['id'];
            $titulo  = $_POST['txt_titulo']; 
            $texto  = $_POST['txt_texto']; 
            
            $Sobre_Nos = new Sobre_Nos();
            
            $Sobre_Nos->setId($id);
            $Sobre_Nos->setTitulo($titulo);
            $Sobre_Nos->setTexto($texto);
            
            $this->Sobre_NosDAO->update($Sobre_Nos);
        }
    }

        public function ativarSobre_Nos() {

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Sobre_Nos = new Sobre_Nos(); 

            $Sobre_Nos->setId($id);
            $Sobre_Nos->setAtivo($ativo);
            
            $this->Sobre_NosDAO->updateAtivo($Sobre_Nos);
        }
    }

        public function excluirSobre_Nos() 
        {

            $id = $_POST['id'];

            $this->Sobre_NosDAO->delete($id);
        }

        public function buscarSobre_NosPorId() 
        {

            $id = $_GET['id'];

            return $this->Sobre_NosDAO->selectById($id);
        }

        public function buscarSobre_Nos() {
        
            return $this->Sobre_NosDAO->selectAll();
        }
    }
        
    