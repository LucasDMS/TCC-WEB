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

class ControllerProdutoDestaque{
    
    private $ProdutoDestaqueDAO;
    
    public function __construct()
    {
        
        //Import do Produto Destaque
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/model/ProdutoDestaque.php");
        
        //Import do Produto DestaqueDAO, para inserir no BD
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" .'/dao/ProdutoDestaqueDAO.php');
        
        //Instancia  Produto DestaqueDAO
        $this->ProdutoDestaqueDAO = new ProdutoDestaqueDAO();
    }

    //Ativar o prdoduto em destaque no site
    public function ativarProdutoDestaque() {
        
         //verifica qual metodo esta sendo requisitado
        //do formulário (POST ou GET)
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            //Instancia do Produto em Destaque
            $ProdutoDestaque = new ProdutoDestaque(); 
            
            //Guardando dos dados do post no objeto
            //do Produto em Destaque
            $ProdutoDestaque->setId($id);
            $ProdutoDestaque->setAtivo($ativo);
            
            //chamada para o metodo de inserir no BD, e estamos passando como parametro o objeto $ProdutoDestaque que tem todos os dados que serão inseridos no BD
            $this->ProdutoDestaqueDAO->updateAtivo($ProdutoDestaque);
        }
    }
    
    //listar todos os produtos em destaques
    public function buscarProdutoDestaque() {
        
        //chamada para o metodo de listar todos os produtos em destaques
        return $this->ProdutoDestaqueDAO->selectAll();
    }
}

?>