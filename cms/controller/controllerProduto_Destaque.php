<?php 
/* 
    Projeto: MVC páginas Produto em Destaque.
    Autor: Kelvin
    Data Criação: 06/04/2019
    
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    
    Objetivo da Classe: página Produto em Destaque.
    
*/

class ControllerProduto_Destaque{
    
    private $Produto_DestaqueDAO;
    
    public function __construct()
    {
        
        //Import do Produto Destaque
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Produto_Destaque.php");
        
        //Import do Produto DestaqueDAO, para inserir no BD
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/Produto_DestaqueDAO.php');
        
        //Instancia  Produto DestaqueDAO
        $this->Produto_DestaqueDAO = new Produto_DestaqueDAO();
    }

    //Ativar o prdoduto em destaque no site
    public function ativarProduto_Destaque() {
        
         //verifica qual metodo esta sendo requisitado
        //do formulário (POST ou GET)
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            //Instancia do Produto em Destaque
            $Produto_Destaque = new Produto_Destaque(); 
            
            //Guardando dos dados do post no objeto
            //do Produto em Destaque
            $Produto_Destaque->setId($id);
            $Produto_Destaque->setAtivo($ativo);
            
            //chamada para o metodo de inserir no BD, e estamos passando como parametro o objeto $Produto_Destaque que tem todos os dados que serão inseridos no BD
            $this->Produto_DestaqueDAO->updateAtivo($Produto_Destaque);
        }
    }
    
    //listar todos os produtos em destaques
    public function buscarProduto_Destaque() {
        
        //chamada para o metodo de listar todos os produtos em destaques
        return $this->Produto_DestaqueDAO->selectAll();
    }
}

?>