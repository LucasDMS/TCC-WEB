<?php
class MenuUsuarioEstabelecimentoDAO {
    private $conex;
    private $Menu;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //Select para pegar um Menu especifico
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_usuario_estabelecimento_menu_usuario_estabelecimento where id_usuario_estabelecimento=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        if ($success) {
            $listMenu = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Menu = new MenuUsuarioEstabelecimento();
                $Menu->setIdMenu($result['id_menu']);
                $Menu->setIdUsuario($result['id_usuario_estabelecimento']);
                array_push($listMenu, $Menu);
            }
            $this->conex -> closeDataBase();
            return $listMenu;
        } else {
            return "Erro";
        }
        
    }
    //Select para todos os Menu
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_menu_usuario_estabelecimento";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listMenu = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Menu = new MenuUsuarioEstabelecimento();
                $Menu->setId($result['id_menu']);
                $Menu->setPaginas($result['paginas']);
                array_push($listMenu, $Menu);
            }
            $this->conex -> closeDataBase();
            return $listMenu;
        } else {
            return "Erro";
        }
    }
      //Select para pegar as permissões do funcionario
      public function selectByPermission($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_usuario_estabelecimento where id_autenticacao = ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        if ($success) {
            $Menu = new MenuUsuarioEstabelecimento();
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                
                $Menu->setIdUsuario($result['id_usuario_estabelecimento']);
            }
        }
        if($Menu == ""){
            echo "sadsaf";
        }else{
            $sql = "select * from tbl_usuario_estabelecimento_menu_usuario_estabelecimento As mu, tbl_menu_usuario_estabelecimento as m where mu.id_menu=m.id_menu and id_usuario_estabelecimento=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $Menu->getIdUsuario());        
            $success = $stm->execute();
            if ($success) {
                $listMenu = [];
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                    $Menu = new MenuUsuarioEstabelecimento();
                    $Menu->setIdMenu($result['id_menu']);
                    array_push($listMenu, $Menu);
                }
                $this->conex -> closeDataBase();
                return $listMenu;
            } else {
                return "Erro";
            }
        }
    }
}