<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 27/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que manipula o banco de dados
    */

    class SetoresDAO{
        private $conex;

        public function __construct(){
            session_start();
            //Recebe a informação da view e envia para o objeto
            require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
            
            //Instancia da classe de conexao com o BD
            $this->conex = new conexaoMysql();

        }

        //select de todos os setores
        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select s.rua, p.* FROM tbl_setores as s, tbl_prateleira as p WHERE s.id_setores = p.id_setores";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 0);  
            $success = $stm->execute();
            if($success){
                $listSetores = [];
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $setores = new Setores(); 
                    $setores->setId($result['id_setores']);
                    $setores->setPrateleira($result['prateleira']);
                    $setores->setCapacidade($result['capacidade']);
                    array_push($listSetores, $setores);
                };
                $this->conex -> closeDataBase();
                return $listSetores;

            }else{
                return "Erro";
            }  
        }

        //select de todos as prateleiras
        public function selectSetores(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_setores where tbl_setores.apagado=0";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 0);  
            $success = $stm->execute();
            if($success){
                $listSetores = [];
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $setores = new Setores(); 
                    $setores->setId($result['id_setores']);
                    $setores->setRua($result['rua']);
                    array_push($listSetores, $setores);
                };
                $this->conex -> closeDataBase();
                return $listSetores;

            }else{
                return "Erro";
            }  
        }

        public function delete($id){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_setores SET apagado = ? where id_setores=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 1);
            $stm->bindValue(2, $id);
            $success = $stm->execute();
            if($success){
                return "sucesso";
            }else{
                echo "Erro!";
            }

        }

        public function inserirSetores(Setores $setores){
            
            //loop para pegar inserir todas as pratileiras e capacidades
            for($i = 0; $i<count($setores->getPrateleira()); $i++){
                $conn = $this->conex->connectDatabase();
                $sql = "call sp_cadastro_setores(?,?,?)";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1, $setores->getRua());
                $stm->bindValue(2, $setores->getPrateleira()[$i]);
                $stm->bindValue(3, $setores->getCapacidade()[$i]);
                $success = $stm->execute();
            }
            //fechando conexão
            $this->conex->closeDataBase();
            if($success){
                echo "Cadastrado com Sucesso!";
            }else{
                echo "Erro!";
            }
        }

        public function selectById($id){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_setores where apagado = ? and id_setores = ?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 0);
            $stm->bindValue(2, $id);  
            $success = $stm->execute();
            if($success){
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $setores = new Setores(); 
                    $setores->setId($result['id_setores']);
                    $setores->setRua($result['rua']);
                    return $setores;
                };
                $this->conex -> closeDataBase();
            }else{
                return "Erro";
            }
        }

        public function selectByIdPrateleira($id){
            $conn = $this->conex->connectDatabase();
            $sql = "select p.prateleira, p.capacidade FROM tbl_prateleira as p WHERE p.id_setores = ?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);  
            $success = $stm->execute();
            if($success){
                $listSetores = [];
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $setores = new Setores(); 
                    $setores->setPrateleira($result['prateleira']);
                    $setores->setCapacidade($result['capacidade']);
                    array_push($listSetores, $setores);
                };
                return $listSetores;
                $this->conex -> closeDataBase();
            }else{
                return "Erro";
            }
        }

        public function update(Setores $setores){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_setores SET rua=? where id_setores=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $setores->getRua());
            $stm->bindValue(2, $setores->getId());
            $success = $stm->execute();
            $this->conex->closeDataBase();
            if($success){
                echo "Atualizado com sucesso!";
                return "Sucesso";
            }else{
                echo $success;
                return "Erro";
            }
        }

    }

?>