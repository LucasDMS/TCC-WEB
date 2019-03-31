<?php 

class sessaoDAO {

    private $conex;
    public function __construct(){
        
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . '/db/conexaoMysql.php');
        $this->conex = new ConexaoMysql();
    }
    
    public function select(Sessao $sessao){
        
        $conn = $this->conex ->connectDatabase();
        $sql = "select * from tbl_usuario where usuario=? and senha=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $sessao->getLogin());
        $stm->bindValue(2, $sessao->getSenha());

        $success = $stm->execute();

        $this->conex -> closeDataBase();

        if($success){
            
            session_start();
            $_SESSION['logado'] = true;

        }
        else{
            echo 'opa';
        }
    }
}

?>