<?php 
class PromocaoDAO{

    private $conex;
    private $Promocao;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    //Função de inserir no banco
    public function insert(Promocao $Promocao) {
        //Conectando ao banco
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_promocao(nome,data_inicio,data_final,imagem,texto,ativo,apagado) values(?,?,?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        //Setando os valores da query
        $stm->bindValue(1, $Promocao->getNome());
        $stm->bindValue(2, $Promocao->getDataInicio());
        $stm->bindValue(3, $Promocao->getDataFinal());
        $stm->bindValue(4, $Promocao->getImagem());
        $stm->bindValue(5, $Promocao->getTexto());
        $stm->bindValue(6, $Promocao->getAtivo());
        $stm->bindValue(7, $Promocao->getApagado());

        //Executando a query
        $success = $stm->execute();

        // print_r($stm->errorInfo());

        

        $this->conex->closeDataBase();
        if ($success) {
            // echo $success;
            return "Sucesso";
        } else {
            // echo $success;
            return "Erro";
        }
    }
    //Função de update no banco
    public function update(Promocao $Promocao) {
        $conn = $this->conex->connectDatabase();
        //If para saber se tem ou não imagem no update
        if($Promocao->getImagem() == null){
            $sql = "UPDATE tbl_promocao SET nome = ?, data_inicio = ?, data_final = ?,texto = ? WHERE id_promocao=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $Promocao->getNome());
            $stm->bindValue(2, $Promocao->getDataInicio());
            $stm->bindValue(3, $Promocao->getDataFinal());
            $stm->bindValue(4, $Promocao->getTexto());
            $stm->bindValue(5, $Promocao->getId());
        }else{
            $sql = "UPDATE tbl_promocao SET nome = ?, data_inicio = ?, data_final = ?,texto = ?, imagem = ? WHERE id_promocao=?;";
            $stm = $conn->prepare($sql);
            //Setando os valores da query
            $stm->bindValue(1, $Promocao->getNome());
            $stm->bindValue(2, $Promocao->getDataInicio());
            $stm->bindValue(3, $Promocao->getDataFinal());
            $stm->bindValue(4, $Promocao->getTexto());
            $stm->bindValue(5, $Promocao->getImagem());
            $stm->bindValue(6, $Promocao->getId());
        }
        //Executando a query
        $success = $stm->execute();
        print_r($stm->errorInfo());
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
    public function delete($id) {
        $conn = $this->conex->connectDatabase();
        //Query do "Delete"
        $sql = "UPDATE tbl_promocao SET apagado = 1 WHERE id_promocao=?;";
        $stm = $conn->prepare($sql);
        //Setando o valor
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        // echo $success;
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
    public function updateAtivo(Promocao $Promocao) {

        $conn = $this->conex->connectDatabase();

        if($Promocao->getAtivo()=="0"){
            $Promocao->setAtivo("1");
        }
        else {
            $Promocao->setAtivo("0");
        }
        //Query de update
        $sql = "update tbl_promocao set ativo=? where id_promocao=?";

        $stm = $conn->prepare($sql);
        //Setando os valores
        $stm->bindValue(1, $Promocao->getAtivo());
        $stm->bindValue(2, $Promocao->getId());
        //Executando a query
        $stm->execute();

        $this->conex->closeDataBase();
    }
    //Select a partir do id do registrou (Usado no update do registro)
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_promocao where id_promocao= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Promocao = new Promocao();
                $Promocao->setId($result['id_promocao']);
                $Promocao->setNome($result['nome']);
                $Promocao->setImagem($result['imagem']);
                $Promocao->setDataInicio($result['data_inicio']);
                $Promocao->setDataFinal($result['data_final']);
                $Promocao->setTexto($result['texto']);
                $Promocao->setApagado($result['apagado']);
                $Promocao->setAtivo($result['ativo']);
                return $Promocao;
            };
            $this->conex -> closeDataBase();
        }
    }
    //Selecionando todos os registros do banco 
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_promocao where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();

        if ($success) {
            //Criando uma lista com os dados
            $listPromocao = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Promocao = new Promocao();
                $Promocao->setId($result['id_promocao']);
                $Promocao->setNome($result['nome']);
                $Promocao->setImagem($result['imagem']);
                $Promocao->setDataInicio($result['data_inicio']);
                $Promocao->setDataFinal($result['data_final']);
                $Promocao->setTexto($result['texto']);
                $Promocao->setApagado($result['apagado']);
                $Promocao->setAtivo($result['ativo']);
                array_push($listPromocao, $Promocao);
            };

            $this->conex -> closeDataBase();
            //retornando a lista
            return $listPromocao;
        } else {
            return "Erro";
        }
    }

    public function participe(Promocao $Promocao) {
        //Conectando ao banco
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_promocao_usuario (id_promocao, id_usuario) VALUES (?,?);";
        // echo $sql;
        // echo $Promocao->getId();
        // echo $Promocao->getIdUsuario();
        $stm = $conn->prepare($sql);
        //Setando os valores da query
        $stm->bindValue(1, $Promocao->getId());
        $stm->bindValue(2, $Promocao->getIdUsuario());
        //Executando a query
        $success = $stm->execute();

        print_r($stm->errorInfo());

        

        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
}
?>