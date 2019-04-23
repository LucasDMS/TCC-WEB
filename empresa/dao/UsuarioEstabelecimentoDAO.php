<?php
class UsuarioEstabelecimentoDAO {
    private $conex;
    private $UsuarioEstabelecimento;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(UsuarioEstabelecimento $UsuarioEstabelecimento, Sessao $Sessao) {
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
        //Select para pegar o ultimo id de insert para fazer o insert em UsuarioEstabelecimentos
        
        //Insert na tabela de UsuarioEstabelecimentos 
        $sql = "insert into tbl_usuario_estabelecimento(nome,ativo,id_autenticacao,id_estabelecimento) values(?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $UsuarioEstabelecimento->getNome()); 
        $stm->bindValue(2, $UsuarioEstabelecimento->getAtivo());        
        $stm->bindValue(3, $conn->lastInsertId());
        $stm->bindValue(4, $UsuarioEstabelecimento->getIdEstabelecimento());
        $stm->execute();
        $this->conex->closeDataBase();

    
        $sql = "SELECT id_usuario_estabelecimento FROM tbl_usuario_estabelecimento order by id_usuario_estabelecimento desc limit 1";
        $stm = $conn->prepare($sql);
        $stm->execute();
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
            $MenuUsuarioEstabelecimento->setIdUsuarioEstabelecimento($result['id_usuario_estabelecimento']);
        }
        foreach($MenuUsuarioEstabelecimento->getIdMenu() as $result){
            
            $sql = "insert into tbl_menu_usuario_estabelecimento(id_menu,id_usuario_estabelecimento) values(?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $result);        
            $stm->bindValue(2, $MenuUsuarioEstabelecimento->getIdUsuarioEstabelecimento());
            $stm->execute();
        }
        $this->conex->closeDataBase();
    }
    public function update(UsuarioEstabelecimento $UsuarioEstabelecimento, Sessao $Sessao, MenuUsuarioEstabelecimento $MenuUsuarioEstabelecimento) {
      $conn = $this->conex->connectDatabase();
        // //Update no UsuarioEstabelecimento
        $sql = "update tbl_usuario_estabelecimento set nome = ?, cargo = ?, setor = ?, data_emissao = ? where id_UsuarioEstabelecimento_web=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $UsuarioEstabelecimento->getNome());        
        $stm->bindValue(2, $UsuarioEstabelecimento->getCargo());
        $stm->bindValue(3, $UsuarioEstabelecimento->getSetor());
        $stm->bindValue(4, $UsuarioEstabelecimento->getDataEmissao());
        $stm->bindValue(5, $UsuarioEstabelecimento->getId());
        $stm->execute();
        //Update na autenticacao
        $sql = "update tbl_autenticacao set login = ?, senha = ?, tipo = ? where id_autenticacao = ?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sessao->getLogin());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getTipo());
        $stm->bindValue(4, $Sessao->getId());
        $stm->execute();

        $sql = "delete from tbl_menu_UsuarioEstabelecimento_web where id_UsuarioEstabelecimento_web =? ";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $MenuUsuarioEstabelecimento->getIdUsuarioEstabelecimento()); 
        $stm->execute();
        foreach($MenuUsuarioEstabelecimento->getIdMenu() as $result){
            $sql = "insert into tbl_menu_UsuarioEstabelecimento_web(id_menu,id_UsuarioEstabelecimento_web) values(?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $result);        
            $stm->bindValue(2, $MenuUsuarioEstabelecimento->getIdUsuarioEstabelecimento());
            $stm->execute();
        }
        $this->conex->closeDataBase();
    }
    //Update no UsuarioEstabelecimento ativo
    public function updateAtivo(UsuarioEstabelecimento $UsuarioEstabelecimento) {
        $conn = $this->conex->connectDatabase();
        if($UsuarioEstabelecimento->getAtivo()=="0"){
            $UsuarioEstabelecimento->setAtivo("1");
        }
        else {
            $UsuarioEstabelecimento->setAtivo("0");
        }
        $sql = "update tbl_UsuarioEstabelecimento_web set ativo=? where id_UsuarioEstabelecimento_web=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $UsuarioEstabelecimento->getAtivo());
        $stm->bindValue(2, $UsuarioEstabelecimento->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }

    //Select para pegar um UsuarioEstabelecimento especifico
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_UsuarioEstabelecimento_web As f, tbl_autenticacao AS a where f.id_autenticacao=a.id_autenticacao AND id_UsuarioEstabelecimento_web=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $UsuarioEstabelecimento = new UsuarioEstabelecimento();
            $UsuarioEstabelecimento->setId($result['id_UsuarioEstabelecimento_web']);
            $UsuarioEstabelecimento->setNome($result['nome']);
            $UsuarioEstabelecimento->setCargo($result['cargo']);
            $UsuarioEstabelecimento->setSetor($result['setor']);
            $UsuarioEstabelecimento->setDataEmissao($result['data_emissao']);
            $UsuarioEstabelecimento->setAtivo($result['ativo']);
            $UsuarioEstabelecimento->setIdAutenticacao($result['id_autenticacao']);
          
            return $UsuarioEstabelecimento;

        }
    }
    //Select para todos os UsuarioEstabelecimento
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_usuario_estabelecimento";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listUsuarioEstabelecimento = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $UsuarioEstabelecimento = new UsuarioEstabelecimento();
                $UsuarioEstabelecimento->setId($result['id_usuario_estabelecimento']);
                $UsuarioEstabelecimento->setNome($result['nome']);
            
                array_push($listUsuarioEstabelecimento, $UsuarioEstabelecimento);
            };
            $this->conex -> closeDataBase();
            return $listUsuarioEstabelecimento;
        } else {
            return "Erro";
        }
    }
}