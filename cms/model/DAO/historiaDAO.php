<?php
class historiaDAO{
    private $conex;
    public function __construct(){
        require_once('conexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Historia $historia){
        $sql = "insert into tbl_nossa_historia(imagem, texto) values ('".$historia ->getImagem()."', '".$historia ->getTexto()."')";
        $PDO_conex = $this->conex ->connectDatabase();
        if($PDO_conex -> query($sql)){
            header('location:index.php');
        }else{
            echo('Erro no script de insert');
            echo $sql;
        }
        
        $this->conex -> closeDataBase();
    }
    public function update(Historia $historia){
        $sql = "update tbl_nossa_historia set imagem= '".$historia->getImagem()."', texto = '".$historia ->getTexto()."'";
        $PDO_conex = $this->conex ->connectDatabase();
        if($PDO_conex -> query($sql)){
            header('location:index.php');
        }else{
            echo('Erro no script de ');
            echo $sql;
        }
        $this->conex -> closeDataBase();
    }
    public function delete($id){
        $sql = "delete from tbl_nossa_historia where id=".$id;
        $PDO_conex = $this->conex->connectDatabase();
        if($PDO_conex -> query($sql)){
            header('location:index.php');
        }else{
            echo('Erro no script de excluir');
            echo $sql;
        }
        $this->conex -> closeDataBase();
    }
    
    public function selectById($id){
        $PDO_conex = $this->conex ->connectDatabase();
        $sql = "select * from tbl_nossa_historia where id=".$id;
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