<?php

class HistoriaDAO {

    private $conex;
    private $historia;

    public function __construct() {

        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    public function insert(Historia $historia) {

        $conn = $this->conex->connectDatabase();

        $sql = "insert into tbl_historia(texto,ordem,ativo,apagado) values(?,?,?,?);";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $historia->getTexto());        
        $stm->bindValue(2, $historia->getOrdem());
        $stm->bindValue(3, $historia->getAtivo());
        $stm->bindValue(4, $historia->getApagado());

        $stm->execute();

        $this->conex->closeDataBase();
    }

    public function update(Historia $historia) {

        $sql = "update tbl_historia set texto=?,ordem=?,ativo=?,apagado=? where id_historia=?";

        $PDO_conex = $this->conex ->connectDatabase();
        if ($PDO_conex -> query($sql)) {
            header('location:index.php');
        } else {
            echo('Erro no script de ');
            echo $sql;
        }
        $this->conex -> closeDataBase();
    }

    public function updateAtivo(Historia $historia) {

        $conn = $this->conex->connectDatabase();

        if($historia->getAtivo()=="0"){
            $historia->setAtivo("1");
        }
        else {
            $historia->setAtivo("0");
        }

        $sql = "update tbl_historia set ativo=? where id_historia=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $historia->getAtivo());
        $stm->bindValue(2, $historia->getId());

        $stm->execute();

        $this->conex->closeDataBase();
    }


    public function delete($id) {

        $conn = $this->conex->connectDatabase();

        $sql = "UPDATE tbl_historia SET apagado=1 WHERE id_historia=?;";

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
    
    public function selectById($id) {

        $conn = $this->conex->connectDatabase();

        $sql = "select * from tbl_historia where id_historia=?;";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $id);        

        $success = $stm->execute();

        $this->conex->closeDataBase();

        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $Historia = new Historia();
            $Historia->setId($result['id_historia']);
            $Historia->setTexto($result['texto']);
            $Historia->setOrdem($result['ordem']);
            $Historia->setAtivo($result['ativo']);
            $Historia->setApagado($result['apagado']);

            return $Historia;
        }
    }

    public function selectAll() {

        $conn = $this->conex->connectDatabase();

        $sql = "select * from tbl_historia where apagado = 0";

        $stm = $conn->prepare($sql);
        $success = $stm->execute();

        if ($success) {

            $listHistoria = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {

                $Historia = new Historia();
                $Historia->setId($result['id_historia']);
                $Historia->setTexto($result['texto']);
                $Historia->setOrdem($result['ordem']);
                $Historia->setAtivo($result['ativo']);
                $Historia->setApagado($result['apagado']);

                array_push($listHistoria, $Historia);
            };

            $this->conex -> closeDataBase();

            return $listHistoria;
        } else {
            return "Erro";
        }
    }
}
