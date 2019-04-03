<?php 
class SustentabilidadeDAO{
    private $conex;
    private $Sustentabilidade;
    public function __construct() {

        session_start();
        require_once($_SESSION['PATH'].'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Sustentabilidade $Sustentabilidade) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_sustentabilidade(texto,apagado,imagem,ativo) values(?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sustentabilidade->getTexto());
        $stm->bindValue(2, $Sustentabilidade->getApagado());
        $stm->bindValue(3, $Sustentabilidade->getImagem());
        $stm->bindValue(4, $Sustentabilidade->getAtivo());
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
    public function update(Sustentabilidade $Sustentabilidade) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_Sustentabilidades_fique_por_dentro SET titulo = ?, texto = ? WHERE id_Sustentabilidades_fique_por_dentro=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sustentabilidade->getTitulo());
        $stm->bindValue(2, $Sustentabilidade->getConteudo());
        $stm->bindValue(3, $Sustentabilidade->getId());
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
        $sql = "UPDATE tbl_Sustentabilidades_fique_por_dentro SET apagado = 1 WHERE id_Sustentabilidades_fique_por_dentro=?;";
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
    public function updateAtivo(Sustentabilidade $Sustentabilidade) {

        $conn = $this->conex->connectDatabase();

        if($Sustentabilidade->getAtivo()=="0"){
            $Sustentabilidade->setAtivo("1");
        }
        else {
            $Sustentabilidade->setAtivo("0");
        }

        $sql = "update tbl_Sustentabilidades_fique_por_dentro set ativo=? where id_Sustentabilidades_fique_por_dentro=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $Sustentabilidade->getAtivo());
        $stm->bindValue(2, $Sustentabilidade->getId());

        $stm->execute();

        $this->conex->closeDataBase();
    }
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_Sustentabilidades_fique_por_dentro where id_Sustentabilidades_fique_por_dentro= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Sustentabilidade = new Sustentabilidade();
                $Sustentabilidade->setId($result['id_Sustentabilidades_fique_por_dentro']);
                $Sustentabilidade->setTitulo($result['titulo']);
                $Sustentabilidade->setConteudo($result['texto']);
                $Sustentabilidade->setApagado($result['apagado']);
                $Sustentabilidade->setOrdem($result['ordem']);
                $Sustentabilidade->setAtivo($result['ativo']);
                return $Sustentabilidade;
            };
            $this->conex -> closeDataBase();
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_sustentabilidade where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listSustentabilidade = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Sustentabilidade = new Sustentabilidade();
                $Sustentabilidade->setId($result['id_sustentabilidade']);
                $Sustentabilidade->setTexto($result['texto']);
                $Sustentabilidade->setImagem($result['imagem']);
                $Sustentabilidade->setApagado($result['apagado']);
                $Sustentabilidade->setAtivo($result['ativo']);
                array_push($listSustentabilidade, $Sustentabilidade);
            };

            $this->conex -> closeDataBase();
            return $listSustentabilidade;
        } else {
            return "Erro";
        }
    }
}
?>