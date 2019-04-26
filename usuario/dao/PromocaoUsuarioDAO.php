<?php 
class PromocaoUsuarioDAO{
    private $conex;
    private $promocaoUsu;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(PromocaoUsuario $promocaoUsu) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_promocao_usuario(id_promocao,id_usuario) values(?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $promocaoUsu->getIdPromocao());
        $stm->bindValue(2, $promocaoUsu->getIdUsuario());
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }

    public function update() {
    }
    
    public function selectById() {
    }

    public function selectAll() {
    }
}
?>