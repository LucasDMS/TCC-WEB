<?php
class historiaDAO{
    private $conex;
    public function __construct(){
        require_once('conexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Historia $historia){
        $conn = $this->conex->connectDatabase();

        $sql = "insert into tbl_historia(texto,status,ordem) values(?,?,?);";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $historia->getTexto());
        $stm->bindValue(2, $historia->getStatus());
        $stm->bindValue(3, $historia->getOrdem());

        $success = $stm->execute();

        $this->conex -> closeDataBase();

        if($success){
            echo $success;
            return "Sucesso";
        }
        else{
            echo $success;
            return "Erro";
        }
    }
    public function update(Historia $historia){
        $sql = "update tbl_historia set imagem= '".$historia->getImagem()."', texto = '".$historia ->getTexto()."'";
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
        $sql = "delete from tbl_historia where id=".$id;
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

    public function selectAll(){
        $conn = $this->conex->connectDatabase();

        $sql = "select * from tbl_historia";

        $stm = $conn->prepare($sql);
        $success = $stm->execute();

        if($success){

            $listHistoria = [];
            foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                
                $historia = new Historia();
                $historia->setId($result['id_historia']);
                $historia->setTexto($result['texto']);
                $historia->setStatus($result['status']);
                $historia->setOrdem($result['ordem']);

                array_push($listHistoria, $historia);
            };

            $this->conex -> closeDataBase();

            return $listHistoria;
        }
        else{
            return "Erro";
        }
    }
}
?>