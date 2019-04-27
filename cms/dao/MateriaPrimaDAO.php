<?php
class MateriaPrimaDAO {
    private $conex;
    private $MateriaPrima;
    private $ProdutoMateriaPrima;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //Select para pegar um MateriaPrima especifico
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_produto_materia_prima where id_produto=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        if ($success) {
            $listMateriaPrima = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $ProdutoMateriaPrima = new ProdutoMateriaPrima();
                $ProdutoMateriaPrima->setId($result['id_produto_materia_prima']);
                $ProdutoMateriaPrima->setIdProduto($result['id_produto']);
                $ProdutoMateriaPrima->setIdMateriaPrima($result['id_materia_prima']);
                array_push($listMateriaPrima, $ProdutoMateriaPrima);
            }
            $this->conex -> closeDataBase();
            return $listMateriaPrima;
        } else {
            return "Erro";
        }
        
    }
    //Select para todos as MateriaPrima
    public function selectMateriaPrima() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_materia_prima where tipo_materia_prima = 'Materia'";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listMateriaPrima = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $MateriaPrima = new MateriaPrima();
                $MateriaPrima->setId($result['id_materia_prima']);
                $MateriaPrima->setNome($result['nome']);
                $MateriaPrima->setDescricao($result['descricao']);
                $MateriaPrima->setTipoMateriaPrima($result['tipo_materia_prima']);
                array_push($listMateriaPrima, $MateriaPrima);
            }
            $this->conex -> closeDataBase();
            return $listMateriaPrima;
        } else {
            return "Erro";
        }
    }
    //Select para todos as MateriaPrima
    public function selectEmbalagem() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_materia_prima where tipo_materia_prima = 'Embalagem'";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listMateriaPrima = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $MateriaPrima = new MateriaPrima();
                $MateriaPrima->setId($result['id_materia_prima']);
                $MateriaPrima->setNome($result['nome']);
                $MateriaPrima->setDescricao($result['descricao']);
                $MateriaPrima->setTipoMateriaPrima($result['tipo_materia_prima']);
                array_push($listMateriaPrima, $MateriaPrima);
            }
            $this->conex -> closeDataBase();
            return $listMateriaPrima;
        } else {
            return "Erro";
        }
    }
   
}