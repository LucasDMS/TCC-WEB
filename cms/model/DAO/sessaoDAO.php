<?php 

class sessaoDAO {

    private $conex;
    public function __construct(){
        require_once('conexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    
    public function select(){
        $PDO_conex = $this->conex ->connectDatabase();
        $sql = "select * from tbl_historia where id=".$id;
        $select = $PDO_conex -> query($sql);
        if($rsHistoria=$select->fetch(PDO::FETCH_ASSOC)){
            $listHistoria = new Historia();
            $listHistoria->setId($rsHistoria['id']);
            $listHistoria->setImagem($rsHistoria['imagem']);
            $listHistoria->setTexto($rsHistoria['texto']);
          
        }
        $this->conex -> closeDataBase();
        return $listHistoria;
    }
}

?>