<?php

class BrindeDAO{
    private $conex;
    private $brinde;
    public function __construct(){

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms". '/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Brinde $brinde) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_brinde(nome_brinde,descricao_brinde,ativo,apagado) values(?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $brinde->getNome());
        $stm->bindValue(2, $brinde->getDescricao());
        $stm->bindValue(3, $brinde->getAtivo());
        $stm->bindValue(4, $brinde->getApagado());
        $sucess = $stm->execute();
        $this->conex->closeDataBase();
        if ($sucess) {
            echo "Cadastrado com Sucesso";
            return "Sucesso";
        } else {
            echo $sucess;
            return "Erro";
        } 
    }
        public function update(Brinde $brinde) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_brinde SET nome_brinde = ?, descricao_brinde = ? WHERE id_brinde=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $brinde->getNome());
        $stm->bindValue(2, $brinde->getDescricao());
        $stm->bindValue(3, $brinde->getId());
        $success = $stm->execute();
        echo $success;
        $this->conex->closeDataBase();
        if ($success) {
            echo "Atualizado com Sucesso";
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function delete($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_brinde SET apagado = 1 WHERE id_brinde=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        echo $success;
        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function updateAtivo(Brinde $brinde) {

        $conn = $this->conex->connectDatabase();

        if($brinde->getAtivo()=="0"){
            $brinde->setAtivo("1");
        }
        else {
            $brinde->setAtivo("0");
        }

        $sql = "update tbl_brinde set ativo=? where id_brinde=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $brinde->getAtivo());
        $stm->bindValue(2, $brinde->getId());

        $stm->execute();

        $this->conex->closeDataBase();
    }
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_brinde where id_brinde= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $brinde = new Brinde();
                $brinde->setId($result['id_brinde']);
                $brinde->setNome($result['nome_brinde']);
                $brinde->setDescricao($result['descricao_brinde']);
                $brinde->setApagado($result['apagado']);
                $brinde->setAtivo($result['ativo']);
                return $brinde;
            };
            $this->conex -> closeDataBase();
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_brinde where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listBrinde = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $brinde = new Brinde();
                $brinde->setId($result['id_brinde']);
                $brinde->setNome($result['nome_brinde']);
                $brinde->setDescricao($result['descricao_brinde']);
                $brinde->setApagado($result['apagado']);
                $brinde->setAtivo($result['ativo']);
                array_push($listBrinde, $brinde);
            };

            $this->conex -> closeDataBase();
            return $listBrinde;
        } else {
            return "Erro";
        }
    }
}
?>
    
    
