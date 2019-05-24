<?php
class UsuarioEstabelecimentoDAO {
    private $conex;
    private $UsuarioEstabelecimento;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(UsuarioEstabelecimento $UsuarioEstabelecimento, Sessao $Sessao, MenuUsuarioEstabelecimento $MenuUsuarioEstabelecimento, $id) {
        $conn = $this->conex->connectDatabase();
        //Select para comparar o limite de contas de usuarios por estabelecimento
        $sql = "select * from tbl_estabelecimento where id_autenticacao = ?";

        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $UsuarioEstabelecimento->setIdEstabelecimento($result['id_estabelecimento']);
                $limite = $result['numero_usuarios'];
            };
        }
        //Comparação do limite
        if($limite>=3){
            echo "Erro!! Limite de usuários atingido.&";
        }else{
            //Insert na tabela de autenticacao
            $sql = "insert into tbl_autenticacao(login,senha,tipo) values(?,?,?);";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $Sessao->getLogin());        
            $stm->bindValue(2, $Sessao->getSenha());
            $stm->bindValue(3, $Sessao->getTipo());
            $success = $stm->execute();
            $idAutenticacao = $conn->lastInsertId();
            if (!$success) {
                echo "Usuário já existente!&";
            }else{
                echo "Cadastro realizado com sucesso!&";
                $sql = "update tbl_estabelecimento set numero_usuarios = numero_usuarios + 1 where id_autenticacao = ?;";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $id);  
                $stm->execute(); 
            }
            echo $conn->lastInsertId(). "asfasfasfsa".  $UsuarioEstabelecimento->getIdEstabelecimento();
            //Insert na tabela de UsuarioEstabelecimentos 
            $sql = "insert into tbl_usuario_estabelecimento(nome,ativo,id_autenticacao,id_estabelecimento) values(?,?,?,?);";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $UsuarioEstabelecimento->getNome());
            $stm->bindValue(2, $UsuarioEstabelecimento->getAtivo());       
            $stm->bindValue(3, $idAutenticacao);
            $stm->bindValue(4, $UsuarioEstabelecimento->getIdEstabelecimento());  
            $stm->execute();
            $idUsuario = $conn->lastInsertId();
            echo $idUsuario;
            foreach($MenuUsuarioEstabelecimento->getIdMenu() as $result){
                $sql = "insert into tbl_usuario_estabelecimento_menu_usuario_estabelecimento(id_menu,id_usuario_estabelecimento) values(?,?)";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $result);        
                $stm->bindValue(2, $idUsuario);
                $stm->execute();

            }
            $this->conex->closeDataBase();
        }
    }
    //Update de Usuarios do estabelecimento
    public function update(UsuarioEstabelecimento $UsuarioEstabelecimento, Sessao $Sessao, MenuUsuarioEstabelecimento $MenuUsuarioEstabelecimento) {
      $conn = $this->conex->connectDatabase();
        // //Update no UsuarioEstabelecimento
        $sql = "update tbl_usuario_estabelecimento set nome = ? where id_usuario_estabelecimento=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $UsuarioEstabelecimento->getNome());        
        $stm->bindValue(2, $UsuarioEstabelecimento->getId());
        $stm->execute();
        //Update na autenticacao
        $sql = "update tbl_autenticacao set login = ?, senha = ? where id_autenticacao = ?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sessao->getLogin());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getId());
        $success = $stm->execute();
        if (!$success){
            echo "Usuário já existente!&";
        }else{
            echo "Atualização realizada com sucesso!&";
            $sql = "delete from tbl_usuario_estabelecimento_menu_usuario_estabelecimento where id_usuario_estabelecimento =? ";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $MenuUsuarioEstabelecimento->getIdUsuario()); 
            $stm->execute();
            foreach($MenuUsuarioEstabelecimento->getIdMenu() as $result){
                $sql = "insert into tbl_usuario_estabelecimento_menu_usuario_estabelecimento(id_menu,id_usuario_estabelecimento) values(?,?)";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $result);        
                $stm->bindValue(2, $MenuUsuarioEstabelecimento->getIdUsuario());
                $stm->execute();
            }
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
        $sql = "update tbl_usuario_estabelecimento set ativo=? where id_usuario_estabelecimento=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $UsuarioEstabelecimento->getAtivo());
        $stm->bindValue(2, $UsuarioEstabelecimento->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }

    //Select para pegar um UsuarioEstabelecimento especifico
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_usuario_estabelecimento As ue, tbl_autenticacao AS a where ue.id_autenticacao=a.id_autenticacao AND id_usuario_estabelecimento=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $UsuarioEstabelecimento = new UsuarioEstabelecimento();
            $UsuarioEstabelecimento->setId($result['id_usuario_estabelecimento']);
            $UsuarioEstabelecimento->setNome($result['nome']);
            $UsuarioEstabelecimento->setAtivo($result['ativo']);
            $UsuarioEstabelecimento->setIdAutenticacao($result['id_autenticacao']);
          
            return $UsuarioEstabelecimento;

        }
    }
    //Select para todos os UsuarioEstabelecimento
    public function selectAll($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_estabelecimento where id_autenticacao = ?";

        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $UsuarioEstabelecimento = new UsuarioEstabelecimento();
            $UsuarioEstabelecimento->setIdEstabelecimento($result['id_estabelecimento']);
        }
        $sql = "select * from tbl_usuario_estabelecimento where id_estabelecimento = ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $UsuarioEstabelecimento->getIdEstabelecimento());
        $success = $stm->execute();
        if ($success) {
            $listUsuarioEstabelecimento = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $UsuarioEstabelecimento = new UsuarioEstabelecimento();
                $UsuarioEstabelecimento->setId($result['id_usuario_estabelecimento']);
                $UsuarioEstabelecimento->setNome($result['nome']);
                $UsuarioEstabelecimento->setAtivo($result['ativo']);   
                $UsuarioEstabelecimento->setIdAutenticacao($result['id_autenticacao']);   
           
                array_push($listUsuarioEstabelecimento, $UsuarioEstabelecimento);
            };
            $this->conex -> closeDataBase();
            return $listUsuarioEstabelecimento;
           
        } else {
            return "Erro";
        }
    }
}