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

        $sql = "SELECT id_autenticacao FROM tbl_autenticacao order by id_autenticacao desc limit 1";
        $stm = $conn->prepare($sql);
        $stm->execute();
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
            $Funcionario->setIdAutenticacao($result['id_autenticacao']);
        }
        $sql = "insert into tbl_funcionario_web(nome,cargo,setor,data_emissao,ativo,id_autenticacao) values(?,?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getNome());        
        $stm->bindValue(2, $Funcionario->getCargo());
        $stm->bindValue(3, $Funcionario->getSetor());
        $stm->bindValue(4, $Funcionario->getDataEmissao());
        $stm->bindValue(5, $Funcionario->getAtivo());
        $stm->bindValue(6, $Funcionario->getIdAutenticacao());
        $stm->execute();
        $this->conex->closeDataBase();
    }
    public function update(Funcionario $Funcionario, Sessao $Sessao) {
        $conn = $this->conex->connectDatabase();
        $sql = "update tbl_funcionario_web set nome = ?, cargo = ?, setor = ?, data_emissao = ?, ativo = ? where id_funcionario_web=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getNome());        
        $stm->bindValue(2, $Funcionario->getCargo());
        $stm->bindValue(3, $Funcionario->getSetor());
        $stm->bindValue(4, $Funcionario->getDataEmissao());
        $stm->bindValue(5, $Funcionario->getAtivo());
        $stm->bindValue(6, $Funcionario->getId());
        $stm->execute();

        $sql = "update tbl_autenticacao set usuario = ?, senha = ?, tipo = ? where id_autenticacao=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getIdAutenticacao());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getTipo());
        $stm->bindValue(4, $Sessao->getId());
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
        $sql = "update tbl_funcionario_web set ativo=? where id_funcionario_web=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getAtivo());
        $stm->bindValue(2, $Funcionario->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }

    
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_funcionario_web As f, tbl_autenticacao AS a where f.id_autenticacao=a.id_autenticacao AND id_funcionario_web=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $Funcionario = new Funcionario();
            $Funcionario->setId($result['id_funcionario_web']);
            $Funcionario->setNome($result['nome']);
            $Funcionario->setCargo($result['cargo']);
            $Funcionario->setSetor($result['setor']);
            $Funcionario->setDataEmissao($result['data_emissao']);
            $Funcionario->setAtivo($result['ativo']);
            $Funcionario->setIdAutenticacao($result['id_autenticacao']);
          
            return $Funcionario;
            var_dump($Funcionario);
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