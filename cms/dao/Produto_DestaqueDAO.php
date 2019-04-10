<?php

/* 
    Projeto: MVC página Produto em Destaque.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: CRUD da página Produto em Destaque.
*/

class Produto_DestaqueDAO {
    private $conex;
    private $produto_destaque;
    public function __construct() 
    {    
        //Recebe a informação da view e envia para o objeto
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        
        //Instancia da classe de conexao com o BD
        $this->conex = new conexaoMysql();
    }
    
    //Atualizar o produto um Produto em Destaque no site ativo
    public function updateAtivo(Produto_Destaque $produto_destaque) {
        $conn = $this->conex->connectDatabase();
        if($produto_destaque->getAtivo()=="0"){
            $produto_destaque->setAtivo("1");
        }
        else {
            $produto_destaque->setAtivo("0");
        }
        $sql = "update tbl_produto set produto_destaque=? where id_produto=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $produto_destaque->getAtivo());
        $stm->bindValue(2, $produto_destaque->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }
    
    //Lista todos os produtos em destaque
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listProduto_Destaque = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Produto_Destaque = new Produto_Destaque();
                $Produto_Destaque->setId($result['id_produto']);
                $Produto_Destaque->setTexto($result['descricao']);
                $Produto_Destaque->setNome($result['nome']);
                $Produto_Destaque->setAtivo($result['produto_destaque']);
                array_push($listProduto_Destaque, $Produto_Destaque);
            };
            $this->conex -> closeDataBase();
            return $listProduto_Destaque;
        } else {
            return "Erro";
        }
    }
}
?>