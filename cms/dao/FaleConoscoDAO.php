<?php
class FaleConoscoDAO {
    private $conex;
    private $faleConosco;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(FaleConosco $faleConosco) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_fale_conosco(nome,email,telefone,celular,estado,cidade,texto_faleconosco,data,status) values(?,?,?,?,?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $faleConosco->getNome());        
        $stm->bindValue(2, $faleConosco->getEmail());
        $stm->bindValue(3, $faleConosco->getTelefone());
        $stm->bindValue(4, $faleConosco->getCelular());
        $stm->bindValue(5, $faleConosco->getEstado());        
        $stm->bindValue(6, $faleConosco->getCidade());
        $stm->bindValue(7, $faleConosco->getTexto());
        $stm->bindValue(8, $faleConosco->getData);
        $stm->bindValue(9, "Não lido");
        $stm->execute();
        $this->conex->closeDataBase();
    }

    public function updateAtivo(FaleConosco $faleConosco) {
        $conn = $this->conex->connectDatabase();
        if($faleConosco->getStatus()=="Não lido"){
            $faleConosco->setStatus("Lido");
        }
        else {
            $faleConosco->setStatus("Não lido");
        }
        $sql = "update tbl_fale_conosco set status=? where id_fale_conosco=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $faleConosco->getStatus());
        $stm->bindValue(2, $faleConosco->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }

    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_fale_conosco where id_fale_conosco= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $faleConosco = new FaleConosco();
            $faleConosco->setId($result['id_fale_conosco']);
            $faleConosco->setNome($result['nome']);
            $faleConosco->setEmail($result['email']);
            $faleConosco->setTelefone($result['telefone']);
            $faleConosco->setCelular($result['celular']);
            $faleConosco->setEstado($result['estado']);
            $faleConosco->setCidade($result['cidade']);
            $faleConosco->setTexto($result['texto_faleconosco']);
            $faleConosco->setData($result['data']);

            return $faleConosco;
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_fale_conosco order by status = 'Lido'";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listFaleConosco = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $faleConosco = new FaleConosco();
                $faleConosco->setId($result['id_fale_conosco']);
                $faleConosco->setNome($result['nome']);
                $faleConosco->setEmail($result['email']);
                $faleConosco->setTelefone($result['telefone']);
                $faleConosco->setCelular($result['celular']);
                $faleConosco->setEstado($result['estado']);
                $faleConosco->setCidade($result['cidade']);
                $faleConosco->setTexto($result['texto_faleconosco']);
                $faleConosco->setData($result['data']);
                $faleConosco->setStatus($result['status']);
                array_push($listFaleConosco, $faleConosco);
            };
            $this->conex -> closeDataBase();
            return $listFaleConosco;
        } else {
            return "Erro";
        }
    }
}