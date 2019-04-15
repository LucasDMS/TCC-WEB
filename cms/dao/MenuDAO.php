<?php
class MenuDAO {
    private $conex;
    private $Menu;
    private $Sessao;
    public function __construct() {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //Select para pegar um Menu especifico
    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_menu_funcionario_web where id_funcionario_web=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        if ($success) {
            $listMenu = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Menu = new MenuFuncionario();
                $Menu->setId($result['id_menu_funcionario_web']);
                $Menu->setData($result['data']);
                $Menu->setIdMenu($result['id_menu']);
                $Menu->setIdFuncionario($result['id_funcionario_web']);
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
            }
            $this->conex -> closeDataBase();
            return $listMenu;
        } else {
            return "Erro";
        }
    }
}