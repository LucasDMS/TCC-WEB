<?php 
class MVVDAO{
    private $conex;
    private $MVV;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(MVV $MVV) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_missao_visao_valor(texto,paragrafo,tipo_texto,apagado,ativo) values(?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $MVV->getTexto());
        $stm->bindValue(2, $MVV->getParagrafo());
        $stm->bindValue(3, $MVV->getTipoTexto());
        $stm->bindValue(4, $MVV->getApagado());
        $stm->bindValue(5, $MVV->getAtivo());
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            echo "Cadastrado com Sucesso";
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function update(MVV $MVV) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_missao_visao_valor SET texto = ?, paragrafo = ?, tipo_texto = ? WHERE id_missao_visao_valor=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $MVV->getTexto());
        $stm->bindValue(2, $MVV->getParagrafo());
        $stm->bindValue(3, $MVV->getTipoTexto());
        $stm->bindValue(4, $MVV->getId());
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
        $sql = "UPDATE tbl_missao_visao_valor SET apagado = 1 WHERE id_missao_visao_valor=?;";
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
    public function updateAtivo(MVV $MVV) {

        $conn = $this->conex->connectDatabase();

        if($MVV->getAtivo()=="0"){
            $MVV->setAtivo("1");
        }
        else {
            $MVV->setAtivo("0");
        }

        $sql = "update tbl_missao_visao_valor set ativo=? where id_missao_visao_valor=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $MVV->getAtivo());
        $stm->bindValue(2, $MVV->getId());

        $stm->execute();

        $this->conex->closeDataBase();
    }
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_missao_visao_valor where id_missao_visao_valor= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $MVV = new MVV();
                $MVV->setId($result['id_missao_visao_valor']);
                $MVV->setTexto($result['texto']);
                $MVV->setTipoTexto($result['tipo_texto']);
                $MVV->setApagado($result['apagado']);
                $MVV->setParagrafo($result['paragrafo']);
                $MVV->setAtivo($result['ativo']);
                return $MVV;
            };
            $this->conex->closeDataBase();
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_missao_visao_valor where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listMVV = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $MVV = new MVV();
                $MVV->setId($result['id_missao_visao_valor']);
                $MVV->setTexto($result['texto']);
                $MVV->setTipoTexto($result['tipo_texto']);
                $MVV->setApagado($result['apagado']);
                $MVV->setParagrafo($result['paragrafo']);
                $MVV->setAtivo($result['ativo']);
                array_push($listMVV, $MVV);
            };

            $this->conex -> closeDataBase();
            return $listMVV;
        } else {
            return "Erro";
        }
    }
}
?>