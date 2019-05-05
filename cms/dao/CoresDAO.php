<?php
class CoresDAO{
    private $conex;
    private $cores;
    public function __construct(){

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function update(Cores $cores) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_cores SET cores = ?, tipo_cores = ? WHERE id_cores=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $cores->getCores());
        $stm->bindValue(2, $cores->getTipoCores());
        $stm->bindValue(3, $cores->getId());
        $sucess = $stm->execute();
        $this->conex->closeDataBase();
        if ($sucess) {
            echo $sucess;
            return "Sucesso";
        } else {
            echo "$sucess";
            return "Erro";
        }
    }
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_cores where id_cores=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $sucess = $stm->execute();
        if ($sucess){

            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $cores = new Cores();
                $cores->setId($result['id_cores']);
                $cores->setCores($result['cores']);
                $cores->setTipoCores($result['tipo_cores']);
                return $cores;
            };
            $this->conex->closeDataBase();
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_cores";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listCores = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $cores = new Cores();
                $cores->setId($result['id_cores']);
                $cores->setCores($result['cores']);
                $cores->setTipoCores($result['tipo_cores']);
                array_push($listCores, $cores);
            };

            $this->conex->closeDataBase();
            return $listCores;
        } else {
            return "Erro";
        }
    }
}
?>