<?php

class BrindeDAO{
    private $conex;
    private $brinde;
    public function __construct(){

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms". '/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Brinde $brinde) {
        
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_pedido_brinde where id_autenticacao=? AND id_brinde=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $brinde->getUsuario());
        $stm->bindValue(2, $brinde->getId());
        $stm->execute();
        if($stm->rowCount() > 0){
            
        } else {
            $sql = "INSERT INTO tbl_pedido_brinde(id_autenticacao,id_brinde,quantidade)VALUE(?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $brinde->getUsuario());
            $stm->bindValue(2, $brinde->getId());
            $stm->bindValue(3, 1);
            $stm->execute();
        }

        $this->conex->closeDataBase();
    }
        public function update(Brinde $brinde) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_brinde SET nome_brinde = ?, descricao_brinde = ? WHERE id_brinde=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $brinde->getNome());
        $stm->bindValue(2, $brinde->getDescricao());
        $stm->bindValue(3, $brinde->getId());
        $success = $stm->execute();
        echo $success;
        $this->conex->closeDataBase();
        if ($success) {
            echo "Atualizado com Sucesso";
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function delete($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_brinde SET apagado = 1 WHERE id_brinde=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        echo $success;
        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function updateAtivo(Brinde $brinde) {

        $conn = $this->conex->connectDatabase();

        if($brinde->getAtivo()=="0"){
            $brinde->setAtivo("1");
        }
        else {
            $brinde->setAtivo("0");
        }

        $sql = "update tbl_brinde set ativo=? where id_brinde=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $brinde->getAtivo());
        $stm->bindValue(2, $brinde->getId());

        $stm->execute();

        $this->conex->closeDataBase();
    }
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_brinde where apagado = ? and id_brinde=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, 0);    
        $stm->bindValue(2, $id);     
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $brinde = new Brinde();
            $brinde->setId($result['id_brinde']);
            $brinde->setNome($result['nome_brinde']);
            $brinde->setDescricao($result['descricao_brinde']);
            $brinde->setImagem($result['img_brinde']);
            $brinde->setPreco($result['preco_brinde']);
          
            return $brinde;
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_brinde where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listBrinde = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $brinde = new Brinde();
                $brinde->setId($result['id_brinde']);
                $brinde->setNome($result['nome_brinde']);
                $brinde->setDescricao($result['descricao_brinde']);
                $brinde->setImagem($result['img_brinde']);
                array_push($listBrinde, $brinde);
            };

            $this->conex -> closeDataBase();
            return $listBrinde;
        } else {
            return "Erro";
        }
    }
}
?>
    
    
