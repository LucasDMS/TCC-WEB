<?php 
class PopsEscolaDAO{
    private $conex;
    private $PopsEscola;
    public function __construct() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    public function insert(PopsEscola $PopsEscola) {
    
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_escola_parceiras(titulo,apagado,imagem,ativo,descricao) values(?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $PopsEscola->getNome());
        $stm->bindValue(2, $PopsEscola->getApagado());
        $stm->bindValue(3, $PopsEscola->getImagem());
        $stm->bindValue(4, $PopsEscola->getStatus());
        $stm->bindValue(5, $PopsEscola->getDescricao());
       
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
    //Função de update no banco
    public function update(PopsEscola $PopsEscola) {
        $conn = $this->conex->connectDatabase();
        //If para saber se tem ou não imagem no update
        if($PopsEscola->getImagem() == null){
            $sql = "UPDATE tbl_escola_parceiras SET titulo = ?, descricao=?  WHERE id_escola_parceiras=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $PopsEscola->getNome());
            $stm->bindValue(2, $PopsEscola->getDescricao());
            $stm->bindValue(3, $PopsEscola->getId());
        }else{
            $sql = "UPDATE tbl_escola_parceiras SET titulo = ?, descricao=?, imagem = ? WHERE id_escola_parceiras=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $PopsEscola->getNome());
            $stm->bindValue(2, $PopsEscola->getDescricao());
            $stm->bindValue(3, $PopsEscola->getImagem());
            $stm->bindValue(4, $PopsEscola->getId());
        }
        //Executando a query
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
    //Deletando o registro 
    public function delete($id){
        $conn = $this->conex->connectDatabase();
        //Query do "Delete"
        $sql = "UPDATE tbl_escola_parceiras SET apagado = ? WHERE id_escola_parceiras=?;";
        $stm = $conn->prepare($sql);
        //Setando o valor
        $stm->bindValue(1, 1);
        $stm->bindValue(2, $id);
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
    //Ativando ou desativando o conteudo no site
    public function updateAtivo(PopsEscola $PopsEscola) {
        $conn = $this->conex->connectDatabase();
        if($PopsEscola->getStatus()=="0"){
            $PopsEscola->setStatus("1");
        }
        else {
            $PopsEscola->setStatus("0");
        }
        //Query de update
        $sql = "update tbl_escola_parceiras set ativo=? where id_escola_parceiras=?";
        $stm = $conn->prepare($sql);
        //Setando os valores
        $stm->bindValue(1, $PopsEscola->getStatus());
        $stm->bindValue(2, $PopsEscola->getId());
        //Executando a query
        $stm->execute();
        $this->conex->closeDataBase();
    }
    //Select a partir do id do registrou (Usado no update do registro)
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_escola_parceiras where id_escola_parceiras= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $PopsEscola = new PopsEscola();
                $PopsEscola->setId($result['id_escola_parceiras']);
                $PopsEscola->setNome($result['titulo']);
                $PopsEscola->setDescricao($result['descricao']);
                $PopsEscola->setApagado($result['apagado']);
                $PopsEscola->setStatus($result['ativo']);
                return $PopsEscola;
            };
            $this->conex -> closeDataBase();
        }
    }
    //Selecionando todos os registros do banco 
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_escola_parceiras where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            //Criando uma lista com os dados
            $listPopsEscola = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $PopsEscola = new PopsEscola();
                $PopsEscola->setId($result['id_escola_parceiras']);
                $PopsEscola->setNome($result['titulo']);
                $PopsEscola->setDescricao($result['descricao']);
                $PopsEscola->setImagem($result['imagem']);
                $PopsEscola->setApagado($result['apagado']);
                $PopsEscola->setStatus($result['ativo']);
                array_push($listPopsEscola, $PopsEscola);
            };
            $this->conex -> closeDataBase();
            //retornando a lista
            return $listPopsEscola;
        } else {
            return "Erro";
        }
    }
}
?>