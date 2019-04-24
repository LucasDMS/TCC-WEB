<?php
class FuncionarioDAO {
    private $conex;
    private $Funcionario;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Funcionario $Funcionario, Sessao $Sessao, MenuFuncionario $MenuFuncionario) {
        $conn = $this->conex->connectDatabase();
        //Insert na tabela de autenticacao
        $sql = "insert into tbl_autenticacao(login,senha,tipo) values(?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sessao->getLogin());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getTipo());
        $success = $stm->execute();

        if (!$success) {
            echo "Usuário já existente!&";
        }else{
            echo "Cadastro realizado com sucesso!&";
        }
        //Select para pegar o ultimo id de insert para fazer o insert em funcionarios
        
        //Insert na tabela de funcionarios 
        $sql = "insert into tbl_funcionario_web(nome,cargo,setor,data_emissao,ativo,id_autenticacao) values(?,?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getNome());        
        $stm->bindValue(2, $Funcionario->getCargo());
        $stm->bindValue(3, $Funcionario->getSetor());
        $stm->bindValue(4, $Funcionario->getDataEmissao());
        $stm->bindValue(5, $Funcionario->getAtivo());
        $stm->bindValue(6, $conn->lastInsertId());
        $stm->execute();
        $this->conex->closeDataBase();

    
        $sql = "SELECT id_funcionario_web FROM tbl_funcionario_web order by id_funcionario_web desc limit 1";
        $stm = $conn->prepare($sql);
        $stm->execute();
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
            $MenuFuncionario->setIdFuncionario($result['id_funcionario_web']);
        }
        foreach($MenuFuncionario->getIdMenu() as $result){
            echo $conn->lastInsertId();
            
            $sql = "insert into tbl_menu_funcionario_web(id_menu,id_funcionario_web) values(?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $result);        
            $stm->bindValue(2, $MenuFuncionario->getIdFuncionario());
            $stm->execute();
        }
        $this->conex->closeDataBase();
    }
    public function update(Funcionario $Funcionario, Sessao $Sessao, MenuFuncionario $MenuFuncionario) {
      $conn = $this->conex->connectDatabase();
        // //Update no funcionario
        $sql = "update tbl_funcionario_web set nome = ?, cargo = ?, setor = ?, data_emissao = ? where id_funcionario_web=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Funcionario->getNome());        
        $stm->bindValue(2, $Funcionario->getCargo());
        $stm->bindValue(3, $Funcionario->getSetor());
        $stm->bindValue(4, $Funcionario->getDataEmissao());
        $stm->bindValue(5, $Funcionario->getId());
        $stm->execute();
        //Update na autenticacao
        $sql = "update tbl_autenticacao set login = ?, senha = ?, tipo = ? where id_autenticacao = ?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sessao->getLogin());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getTipo());
        $stm->bindValue(4, $Sessao->getId());
        $stm->execute();

        $sql = "delete from tbl_menu_funcionario_web where id_funcionario_web =? ";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $MenuFuncionario->getIdFuncionario()); 
        $stm->execute();
        foreach($MenuFuncionario->getIdMenu() as $result){
            $sql = "insert into tbl_menu_funcionario_web(id_menu,id_funcionario_web) values(?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $result);        
            $stm->bindValue(2, $MenuFuncionario->getIdFuncionario());
            $stm->execute();
        }
        $this->conex->closeDataBase();
    }
    //Update no funcionario ativo
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

    //Select para pegar um funcionario especifico
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

        }
    }
    //Select para todos os funcionario
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