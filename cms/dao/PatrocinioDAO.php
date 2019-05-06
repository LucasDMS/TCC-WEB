<?php 
class PatrocinioDAO{
    private $conex;
    private $Patrocinio;
    public function __construct() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    public function insert(Patrocinio $Patrocinio) {
    
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_patrocinio(nome,apagado,imagem,ativo,descricao) values(?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Patrocinio->getNome());
        $stm->bindValue(2, $Patrocinio->getApagado());
        $stm->bindValue(3, $Patrocinio->getImagem());
        $stm->bindValue(4, $Patrocinio->getStatus());
        $stm->bindValue(5, $Patrocinio->getDescricao());
       
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            echo "Cadastrado com Sucesso";
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    //Função de update no banco
    public function update(Patrocinio $Patrocinio) {
        $conn = $this->conex->connectDatabase();
        //If para saber se tem ou não imagem no update
        if($Patrocinio->getImagem() == null){
            $sql = "UPDATE tbl_patrocinio SET nome = ?, descricao=?  WHERE id_patrocinio=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $Patrocinio->getNome());
            $stm->bindValue(2, $Patrocinio->getDescricao());
            $stm->bindValue(3, $Patrocinio->getId());
        }else{
            $sql = "UPDATE tbl_patrocinio SET nome = ?, descricao=?, imagem = ? WHERE id_patrocinio=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $Patrocinio->getNome());
            $stm->bindValue(2, $Patrocinio->getDescricao());
            $stm->bindValue(3, $Patrocinio->getImagem());
            $stm->bindValue(4, $Patrocinio->getId());
        }
        //Executando a query
        $success = $stm->execute();
        
        $this->conex->closeDataBase();
        if ($success) {
            echo "Atualizado com Sucesso";
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
        $sql = "UPDATE tbl_patrocinio SET apagado = ? WHERE id_patrocinio=?;";
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
    public function updateAtivo(Patrocinio $Patrocinio) {
        $conn = $this->conex->connectDatabase();
        if($Patrocinio->getStatus()=="0"){
            $Patrocinio->setStatus("1");
        }
        else {
            $Patrocinio->setStatus("0");
        }
        //Query de update
        $sql = "update tbl_patrocinio set ativo=? where id_patrocinio=?";
        $stm = $conn->prepare($sql);
        //Setando os valores
        $stm->bindValue(1, $Patrocinio->getStatus());
        $stm->bindValue(2, $Patrocinio->getId());
        //Executando a query
        $stm->execute();
        $this->conex->closeDataBase();
    }
    //Select a partir do id do registrou (Usado no update do registro)
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_patrocinio where id_patrocinio= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Patrocinio = new Patrocinio();
                $Patrocinio->setId($result['id_patrocinio']);
                $Patrocinio->setNome($result['nome']);
                $Patrocinio->setDescricao($result['descricao']);
                $Patrocinio->setApagado($result['apagado']);
                $Patrocinio->setStatus($result['ativo']);
                return $Patrocinio;
            };
            $this->conex -> closeDataBase();
        }
    }
    //Selecionando todos os registros do banco 
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_patrocinio where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            //Criando uma lista com os dados
            $listPatrocinio = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Patrocinio = new Patrocinio();
                $Patrocinio->setId($result['id_patrocinio']);
                $Patrocinio->setNome($result['nome']);
                $Patrocinio->setDescricao($result['descricao']);
                $Patrocinio->setImagem($result['imagem']);
                $Patrocinio->setApagado($result['apagado']);
                $Patrocinio->setStatus($result['ativo']);
                array_push($listPatrocinio, $Patrocinio);
            };
            $this->conex -> closeDataBase();
            //retornando a lista
            return $listPatrocinio;
        } else {
            return "Erro";
        }
    }
}
?>