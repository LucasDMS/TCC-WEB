<?php
class PrateleiraDAO {
    private $conex;
    private $Prateleira;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    //Select para todas as Prateleira
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_prateleira as p, tbl_setores as s where p.id_setores=s.id_setores";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();

        if ($success) {
            $listPrateleira = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Prateleira = new Prateleira();
                $Prateleira->setId($result['id_prateleira']);
                $Prateleira->setPrateleira($result['prateleira']);
                $Prateleira->setCapacidade($result['capacidade']);
                $Prateleira->setQuantidade($result['quantidade']);
                $Prateleira->setIdSetores($result['id_setores']);
                array_push($listPrateleira, $Prateleira);
            }
            $this->conex -> closeDataBase();
            return $listPrateleira;
        } else {
            return "Erro";
        }
    }
}