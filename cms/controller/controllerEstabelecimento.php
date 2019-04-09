<?php 
/* 
    Projeto: MVC páginas Estabelecimento.
    Autor: Kelvin
    Data Criação: 06/04/2019
    
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    
    Objetivo da Classe: página Estabelecimento.
    
*/


class ControllerEstabelecimento{
    
    private $EstabelecimentoDAO;
    
    public function __construct()
    {
        
        //Import do Estabelecimento
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/model/Estabelecimento.php");
        
        //Import do EstabelecimentoDAO, para inserir no BD
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/EstabelecimentoDAO.php');
        
        //Instancia EstabelecimentoDAO
        $this->EstabelecimentoDAO = new EstabelecimentoDAO();
    }
    
    
    //Ativar o Estabelecimento no site
    public function ativarEstabelecimento() {
        
        //verifica qual metodo esta sendo requisitado
        //do formulário (POST ou GET)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $id = $_POST['id'];
            $ativo = $_POST['ativo'];
            
            //Instancia do Estabelecimento
            $Estabelecimento = new Estabelecimento();
            
            //Guardando dos dados do post no objeto
            //do Estabelecimento
            $Estabelecimento->setId($id);
            $Estabelecimento->setAtivo($ativo);
            
            //chamada para o metodo de inserir no BD, e estamos passando como parametro o objeto $Estabelecimento que tem todos os dados que serão inseridos no BD
            $this->EstabelecimentoDAO->updateAtivo($Estabelecimento);
        }
    }
    
     //listar todos os Estabelecimentos
     public function buscarEstabelecimento() {
        
        //chamada para o metodo de listar todos os Estabelecimentos
        return $this->EstabelecimentoDAO->selectAll();
    }
}

?>