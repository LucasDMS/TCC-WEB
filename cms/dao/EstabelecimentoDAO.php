<?php
class EstabelecimentoDAO {
    private $conex;
    private $estabelecimento;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function updateAtivo(Estabelecimento $estabelecimento) {
        $conn = $this->conex->connectDatabase();
        if($estabelecimento->getAtivo()=="0"){
            $estabelecimento->setAtivo("1");
        }
        else {
            $estabelecimento->setAtivo("0");
        }
        $sql = "update tbl_estabelecimento set site=? where id_estabelecimento=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $estabelecimento->getAtivo());
        $stm->bindValue(2, $estabelecimento->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }


    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_estabelecimento where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listEstabelecimento = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Estabelecimento = new Estabelecimento();
                $Estabelecimento->setId($result['id_estabelecimento']);
                $Estabelecimento->setTexto($result['descricao']);
                $Estabelecimento->setNome($result['nome_fantasia']);
                $Estabelecimento->setAtivo($result['site']);
                array_push($listEstabelecimento, $Estabelecimento);
            };
            $this->conex -> closeDataBase();
            return $listEstabelecimento;
        } else {
            return "Erro";
        }
    }
}