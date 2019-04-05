<?php 
class ProdutoDAO{

    private $conex;
    private $Produto;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    //Ativando ou desativando o conteudo no site
    public function updateAtivo(Produtos $Produto) {

        $conn = $this->conex->connectDatabase();

        if($Produto->getAtivo()=="0"){
            $Produto->setAtivo("1");
        }
        else {
            $Produto->setAtivo("0");
        }
        //Query de update
        $sql = "update tbl_produto set ativo=? where id_produto=?";

        $stm = $conn->prepare($sql);
        //Setando os valores
        $stm->bindValue(1, $Produto->getAtivo());
        $stm->bindValue(2, $Produto->getId());
        //Executando a query
        $stm->execute();

        $this->conex->closeDataBase();
    }

    //Selecionando todos os registros do banco 
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();

        if ($success) {
            //Criando uma lista com os dados
            $listProduto = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Produto = new Produtos();
                $Produto->setId($result['id_produto']);
                $Produto->setNome($result['nome']);
                $Produto->setDescricao($result['descricao']);
                $Produto->setTamanho($result['tamanho']);
                $Produto->setModoPreparo($result['modo_preparo']);
                $Produto->setTempoProducao($result['tempo_producao']);
                $Produto->setIpi($result['ipi']);
                $Produto->setIdNutricional($result['id_nutricional']);
                $Produto->setAtivo($result['ativo']);
                $Produto->setApagado($result['apagado']);

                array_push($listProduto, $Produto);
            };

            $this->conex -> closeDataBase();
            //retornando a lista
            return $listProduto;
        } else {
            return "Erro";
        }
    }
}
?>