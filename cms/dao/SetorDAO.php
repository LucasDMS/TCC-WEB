<?php
class SetorDAO {
    private $conex;
    private $Setor;
    private $ProdutoSetor;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //Select para pegar um Setor especifico
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto_setores_produto where id_produto=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        if ($success) {
            $listSetor = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $ProdutoSetor = new ProdutoSetor();
                $ProdutoSetor->setId($result['id_produto_setores_produto']);
                $ProdutoSetor->setIdProduto($result['id_produto']);
                $ProdutoSetor->setIdSetor($result['id_setores']);
                array_push($listSetor, $ProdutoSetor);
            }
            $this->conex -> closeDataBase();
            return $listSetor;
        } else {
            return "Erro";
        }
        
    }
    //Select para todos os Setor
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_setores";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listSetor = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Setor = new Setor();
                $Setor->setId($result['id_setores']);
                $Setor->setCapacidade($result['capacidade']);
                $Setor->setRua($result['rua']);
                array_push($listSetor, $Setor);
            }
            $this->conex -> closeDataBase();
            return $listSetor;
        } else {
            return "Erro";
        }
    }
}