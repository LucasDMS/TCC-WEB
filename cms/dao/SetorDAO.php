<?php
class SetorDAO {
    private $conex;
    private $Setor;
    private $ProdutoSetor;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //Select para pegar um Setor especifico
    public function selectByIdMateria($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_materia_prima_prateleira where id_materia_prima=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();


        if ($success) {
            $listSetor = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $ProdutoSetor = new MateriaPrimaSetor();
                $ProdutoSetor->setId($result['id_materia_prima_prateleira']);
                $ProdutoSetor->setIdMateriaPrima($result['id_materia_prima']);
                $ProdutoSetor->setIdPrateleira($result['id_prateleira']);
                array_push($listSetor, $ProdutoSetor);
            }
            $this->conex -> closeDataBase();
            return $listSetor;
        } else {
            return "Erro";
        }
        
    }
    //Select para pegar um Setor especifico
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto_prateleira where id_produto=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();


        if ($success) {
            $listSetor = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $ProdutoSetor = new ProdutoSetor();
                $ProdutoSetor->setId($result['id_produto_setores_produto']);
                $ProdutoSetor->setIdProduto($result['id_produto']);
                $ProdutoSetor->setIdPrateleira($result['id_prateleira']);
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