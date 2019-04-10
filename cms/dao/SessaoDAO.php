<?php 
class sessaoDAO {
    private $conex;
    public function __construct(){
        
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . '/db/conexaoMysql.php');
        $this->conex = new ConexaoMysql();
    }
    
    public function select(Sessao $sessao){
        
        $conn = $this->conex ->connectDatabase();
        $sql = "select * from tbl_autenticacao where usuario=? and senha=?";

        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $sessao->getLogin());
        $stm->bindValue(2, $sessao->getSenha());
    
        $stm->execute();

        $linhas = 0;

        $returnSessao = new Sessao();
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {

            $returnSessao->setId($result['id_autenticacao']);
            $returnSessao->setTipo($result['tipo']);

            $linhas ++;
        }

        $this->conex -> closeDataBase();
        if($linhas == 1){
            
            echo '1';
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['tipo'] = $returnSessao->getTipo();
        }
        else{
            echo '0';
        }
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
            
            $Sessao = new Sessao();
            $Sessao->setId($result['id_autenticacao']);
            $Sessao->setLogin($result['usuario']);
            $Sessao->setSenha($result['senha']);
            $Sessao->setTipo($result['tipo']);
          
 
            return $Sessao;
        }
    }
}
?>