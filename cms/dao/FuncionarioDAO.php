<?php
class FuncionarioDAO {
    private $conex;
    private $Funcionario;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Funcionario $Funcionario, Sessao $Sessao) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_autenticacao(usuario,senha,tipo) values(?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sessao->getLogin());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getTipo());
        $stm->execute();
        $sql2 = "SELECT id_autenticacao FROM tbl_autenticacao order by id_autenticacao desc limit 1";
        $stm2 = $conn->prepare($sql2);
        $stm2->execute();
        foreach ($stm2->fetchAll(PDO::FETCH_ASSOC) as $result) {
            $Funcionario = new Funcionario();
            $Funcionario->setIdAutenticacao($result['id_autenticacao']);
        }
        $sql1 = "insert into tbl_funcionario_web(nome,cargo,setor,data_emissao,ativo,id_autenticacao) values(?,?,?,?,?,?);";
        $stm1 = $conn->prepare($sql1);
        $stm1->bindValue(1, $Funcionario->getNome());        
        $stm1->bindValue(2, $Funcionario->getCargo());
        $stm1->bindValue(3, $Funcionario->getSetor());
        $stm1->bindValue(4, $Funcionario->getDataEmissao());
        $stm1->bindValue(5, $Funcionario->getAtivo());
        $stm1->bindValue(6, $Funcionario->getIdAutenticacao());
        $stm1->execute();
        $this->conex->closeDataBase();
        echo $sql1;
    }
    public function update(Funcionario $Funcionario) {
        $conn = $this->conex->connectDatabase();
        $sql = "update tbl_Funcionario set texto=? where id_Funcionario=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getTexto());
        $stm->bindValue(2, $Funcionario->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }
    public function updateAtivo(Funcionario $Funcionario) {
        $conn = $this->conex->connectDatabase();
        if($Funcionario->getAtivo()=="0"){
            $Funcionario->setAtivo("1");
        }
        else {
            $Funcionario->setAtivo("0");
        }
        $sql = "update tbl_Funcionario set ativo=? where id_Funcionario=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getAtivo());
        $stm->bindValue(2, $Funcionario->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }
    public function delete($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_Funcionario SET apagado=1 WHERE id_Funcionario=?;";
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
        $sql = "select * from tbl_Funcionario where id_Funcionario=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $Funcionario = new Funcionario();
            $Funcionario->setId($result['id_Funcionario']);
            $Funcionario->setTexto($result['texto']);
            $Funcionario->setOrdem($result['ordem']);
            $Funcionario->setAtivo($result['ativo']);
            $Funcionario->setApagado($result['apagado']);
            return $Funcionario;
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_funcionario_web";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listFuncionario = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Funcionario = new Funcionario();
                $Funcionario->setId($result['id_funcionario_web']);
                $Funcionario->setNome($result['nome']);
                $Funcionario->setCargo($result['cargo']);
                $Funcionario->setSetor($result['setor']);
                $Funcionario->setDataEmissao($result['data_emissao']);
                $Funcionario->setAtivo($result['ativo']);
                $Funcionario->setIdAutenticacao($result['id_autenticacao']);
                array_push($listFuncionario, $Funcionario);
            };
            $this->conex -> closeDataBase();
            return $listFuncionario;
        } else {
            return "Erro";
        }
    }
}