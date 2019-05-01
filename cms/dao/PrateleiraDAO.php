<?php
class PrateleiraDAO {
    private $conex;
    private $Prateleira;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    //Select para pegar uma Prateleira especifica
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto_Prateleiraes_produto where id_produto=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        if ($success) {
            $listPrateleira = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $ProdutoPrateleira = new ProdutoPrateleira();
                $ProdutoPrateleira->setId($result['id_produto_Prateleiraes_produto']);
                $ProdutoPrateleira->setIdProduto($result['id_produto']);
                $ProdutoPrateleira->setIdPrateleira($result['id_Prateleiraes']);
                array_push($listPrateleira, $ProdutoPrateleira);
            }
            $this->conex -> closeDataBase();
            return $listPrateleira;
        } else {
            return "Erro";
        }
        
    }
    //Select para todas as Prateleira
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_prateleira";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listPrateleira = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Prateleira = new Prateleira();
                $Prateleira->setId($result['id_prateleira']);
                $Prateleira->setPrateleira($result['prateleira']);
                $Prateleira->setCapacidade($result['capacidade']);
                array_push($listPrateleira, $Prateleira);
            }
            $this->conex -> closeDataBase();
            return $listPrateleira;
        } else {
            return "Erro";
        }
    }
}