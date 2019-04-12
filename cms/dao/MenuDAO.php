<?php
class MenuDAO {
    private $conex;
    private $Menu;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Menu $Menu, Sessao $Sessao) {
        $conn = $this->conex->connectDatabase();
        //Insert na tabela de autenticacao
        $sql = "insert into tbl_autenticacao(login,senha,tipo) values(?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sessao->getLogin());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getTipo());
        $stm->execute();
        //Select para pegar o ultimo id de insert para fazer o insert em Menus
        $sql = "SELECT id_autenticacao FROM tbl_autenticacao order by id_autenticacao desc limit 1";
        $stm = $conn->prepare($sql);
        $stm->execute();
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
            $Menu->setIdAutenticacao($result['id_autenticacao']);
        }
        //Insert na tabela de Menus 
        $sql = "insert into tbl_Menu_web(nome,cargo,setor,data_emissao,ativo,id_autenticacao) values(?,?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Menu->getNome());        
        $stm->bindValue(2, $Menu->getCargo());
        $stm->bindValue(3, $Menu->getSetor());
        $stm->bindValue(4, $Menu->getDataEmissao());
        $stm->bindValue(5, $Menu->getAtivo());
        $stm->bindValue(6, $Menu->getIdAutenticacao());
        $stm->execute();
        $this->conex->closeDataBase();
    }
    public function update(Menu $Menu, Sessao $Sessao) {
      $conn = $this->conex->connectDatabase();
        // //Update no Menu
        $sql = "update tbl_Menu_web set nome = ?, cargo = ?, setor = ?, data_emissao = ? where id_Menu_web=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Menu->getNome());        
        $stm->bindValue(2, $Menu->getCargo());
        $stm->bindValue(3, $Menu->getSetor());
        $stm->bindValue(4, $Menu->getDataEmissao());
        $stm->bindValue(5, $Menu->getId());
        $stm->execute();
        //Update na autenticacao
        $sql = "update tbl_autenticacao set login = ?, senha = ?, tipo = ? where id_autenticacao = ?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Sessao->getLogin());        
        $stm->bindValue(2, $Sessao->getSenha());
        $stm->bindValue(3, $Sessao->getTipo());
        $stm->bindValue(4, $Sessao->getId());
        $stm->execute();
  
        $this->conex->closeDataBase();
    }
    //Update no Menu ativo
    public function updateAtivo(Menu $Menu) {
        $conn = $this->conex->connectDatabase();
        if($Menu->getAtivo()=="0"){
            $Menu->setAtivo("1");
        }
        else {
            $Menu->setAtivo("0");
        }
        $sql = "update tbl_Menu_web set ativo=? where id_Menu_web=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Menu->getAtivo());
        $stm->bindValue(2, $Menu->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }

    //Select para pegar um Menu especifico
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_menu_funcionario_web As mf, tbl_menu AS m, tbl_funcionario_web AS fw where mf.id_funcionario_web=fw.id_funcionario_web AND mf.id_menu=m.id_menu AND ativo = 1;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $Menu = new Menu();
            $Menu->setId($result['id_Menu_web']);
            $Menu->setNome($result['nome']);
            $Menu->setCargo($result['cargo']);
            $Menu->setSetor($result['setor']);
            $Menu->setDataEmissao($result['data_emissao']);
            $Menu->setAtivo($result['ativo']);
            $Menu->setIdAutenticacao($result['id_autenticacao']);
          
            return $Menu;

        }
    }
    //Select para todos os Menu
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_menu";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listMenu = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Menu = new Menu();
                $Menu->setId($result['id_menu']);
                $Menu->setPaginas($result['paginas']);

                array_push($listMenu, $Menu);
            };
            $this->conex -> closeDataBase();
            return $listMenu;
        } else {
            return "Erro";
        }
    }
}