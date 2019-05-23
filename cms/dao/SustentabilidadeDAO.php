<?php 
class SustentabilidadeDAO{

    private $conex;
    private $Sustentabilidade;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    //Função de inserir no banco
    public function insert(Sustentabilidade $Sustentabilidade) {
        //Conectando ao banco
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_sustentabilidade(texto,apagado,imagem,ativo) values(?,?,?,?);";
        $stm = $conn->prepare($sql);
        //Setando os valores da query
        $stm->bindValue(1, $Sustentabilidade->getTexto());
        $stm->bindValue(2, $Sustentabilidade->getApagado());
        $stm->bindValue(3, $Sustentabilidade->getImagem());
        $stm->bindValue(4, $Sustentabilidade->getAtivo());
        //Executando a query
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
    public function update(Sustentabilidade $Sustentabilidade) {
        $conn = $this->conex->connectDatabase();
        //If para saber se tem ou não imagem no update
        if($Sustentabilidade->getImagem() == null){
            $sql = "UPDATE tbl_sustentabilidade SET texto = ?  WHERE id_sustentabilidade=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $Sustentabilidade->getTexto());
            $stm->bindValue(2, $Sustentabilidade->getId());
        }else{
            $sql = "UPDATE tbl_sustentabilidade SET texto = ?, imagem = ? WHERE id_sustentabilidade=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $Sustentabilidade->getTexto());
            $stm->bindValue(2, $Sustentabilidade->getImagem());
            $stm->bindValue(3, $Sustentabilidade->getId());
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
        $sql = "UPDATE tbl_sustentabilidade SET apagado = 1 WHERE id_sustentabilidade=?;";
        $stm = $conn->prepare($sql);
        //Setando o valor
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
    //Ativando ou desativando o conteudo no site
    public function updateAtivo(Sustentabilidade $Sustentabilidade) {

        $conn = $this->conex->connectDatabase();

        if($Sustentabilidade->getAtivo()=="0"){
            $Sustentabilidade->setAtivo("1");
        }
        else {
            $Sustentabilidade->setAtivo("0");
        }
        //Query de update
        $sql = "update tbl_sustentabilidade set ativo=? where id_sustentabilidade=?";

        $stm = $conn->prepare($sql);
        //Setando os valores
        $stm->bindValue(1, $Sustentabilidade->getAtivo());
        $stm->bindValue(2, $Sustentabilidade->getId());
        //Executando a query
        $stm->execute();

        $this->conex->closeDataBase();
    }
    //Select a partir do id do registrou (Usado no update do registro)
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_sustentabilidade where id_sustentabilidade= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Sustentabilidade = new Sustentabilidade();
                $Sustentabilidade->setId($result['id_sustentabilidade']);
                $Sustentabilidade->setTexto($result['texto']);
                $Sustentabilidade->setApagado($result['apagado']);
                $Sustentabilidade->setAtivo($result['ativo']);
                return $Sustentabilidade;
            };
            $this->conex -> closeDataBase();
        }
    }
    //Selecionando todos os registros do banco 
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_sustentabilidade where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            //Criando uma lista com os dados
            $listSustentabilidade = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Sustentabilidade = new Sustentabilidade();
                $Sustentabilidade->setId($result['id_sustentabilidade']);
                $Sustentabilidade->setTexto($result['texto']);
                $Sustentabilidade->setImagem($result['imagem']);
                $Sustentabilidade->setApagado($result['apagado']);
                $Sustentabilidade->setAtivo($result['ativo']);
                array_push($listSustentabilidade, $Sustentabilidade);
            };

            $this->conex -> closeDataBase();
            //retornando a lista
            return $listSustentabilidade;
        } else {
            return "Erro";
        }
    }
}
?>