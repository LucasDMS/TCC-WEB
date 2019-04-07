<?php 
class MVVDAO{
    private $conex;
    private $MVV;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(MVV $MVV) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_missao_visao_valor(texto,apagado,paragrafo,ativo) values(?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $MVV->getTitulo());
        $stm->bindValue(2, $MVV->getConteudo());
        $stm->bindValue(3, $MVV->getApagado());
        $stm->bindValue(4, $MVV->getOrdem());
        $stm->bindValue(5, $MVV->getAtivo());
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function update(MVV $MVV) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_missao_visao_valor SET titulo = ?, texto = ? WHERE id_MVVs_fique_por_dentro=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $MVV->getTitulo());
        $stm->bindValue(2, $MVV->getConteudo());
        $stm->bindValue(3, $MVV->getId());
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
    public function delete($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_missao_visao_valor SET apagado = 1 WHERE id_MVVs_fique_por_dentro=?;";
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

        $sql = "update tbl_missao_visao_valor set ativo=? where id_MVVs_fique_por_dentro=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $MVV->getAtivo());
        $stm->bindValue(2, $MVV->getId());

        $stm->execute();

        $this->conex->closeDataBase();
    }
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_missao_visao_valor where id_MVVs_fique_por_dentro= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $MVV = new MVV();
                $MVV->setId($result['id_MVVs_fique_por_dentro']);
                $MVV->setTitulo($result['titulo']);
                $MVV->setConteudo($result['texto']);
                $MVV->setApagado($result['apagado']);
                $MVV->setOrdem($result['ordem']);
                $MVV->setAtivo($result['ativo']);
                return $MVV;
            };
            $this->conex -> closeDataBase();
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
                $MVV->setId($result['id_MVVs_fique_por_dentro']);
                $MVV->setTitulo($result['titulo']);
                $MVV->setConteudo($result['texto']);
                $MVV->setApagado($result['apagado']);
                $MVV->setOrdem($result['ordem']);
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