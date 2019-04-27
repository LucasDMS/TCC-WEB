<?php
class SetorDAO {
    private $conex;
    private $Setor;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //Select para pegar um Setor especifico
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_setor_funcionario_web where id_funcionario_web=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        if ($success) {
            $listSetor = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Setor = new SetorFuncionario();
                $Setor->setId($result['id_Setor_funcionario_web']);
                $Setor->setData($result['data']);
                $Setor->setIdSetor($result['id_Setor']);
                $Setor->setIdFuncionario($result['id_funcionario_web']);
                array_push($listSetor, $Setor);
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
                $Setor->setPrateleira($result['prateleira']);
                array_push($listSetor, $Setor);
            }
            $this->conex -> closeDataBase();
            return $listSetor;
        } else {
            return "Erro";
        }
    }
}