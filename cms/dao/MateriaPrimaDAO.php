<?php

     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 01/05/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que manipula o banco de dados
    */
    class MateriaPrimaDAO{
        private $conex;
        private $MateriaPrima;
        public function __construct(){
            session_start();
            require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function inserir(MateriaPrima $MateriaPrima){
            $conn = $this->conex->connectDatabase();
            $sql = "Insert into tbl_materia_prima(nome,descricao,validade,quantidade,tipo_materia_prima,apagado) VALUES (?,?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $MateriaPrima->getNome());
            $stm->bindValue(2, $MateriaPrima->getDescricao());
            $stm->bindValue(3, $MateriaPrima->getDataValidade());
            $stm->bindValue(4, $MateriaPrima->getQuantidade());
            $stm->bindValue(5, $MateriaPrima->getTipoMateria());
            $stm->bindValue(6, 0);
            $sucess = $stm->execute();

            $this->conex->closeDataBase();
            if($sucess){
                echo $sucess;
                return "Sucesso";
            }else{
                echo $sucess;
                return "Erro";
            }
        }

        public function update(MateriaPrima $MateriaPrima){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_materia_prima SET nome = ?, descricao = ?, validade = ?, quantidade = ?, tipo_materia_prima = ? where id_materia_prima=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $MateriaPrima->getNome());
            $stm->bindValue(2, $MateriaPrima->getDescricao());
            $stm->bindValue(3, $MateriaPrima->getDataValidade());
            $stm->bindValue(4, $MateriaPrima->getQuantidade());
            $stm->bindValue(5, $MateriaPrima->getTipoMateria());
            $stm->bindValue(6, $MateriaPrima->getId());
            $success = $stm->execute();
            echo $success;
            $this->conex->closeDataBase();
            if($success){
                echo $success;
                return "Sucesso";
            }else{
                echo $success;
                return "Erro";
            }
            
        }

        public function delete($id){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_materia_prima SET apagado = ? where id_materia_prima = ?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 1);
            $stm->bindValue(2, $id);
            $sucess = $stm->execute();
            $this->conex->closeDataBase();
            echo($id);
            if ($sucess){
                echo $success;
                return "Sucesso";
            }else{
                echo $success;
                return "Erro";
            }
        }

        public function selectById($id){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_materia_prima where id_materia_prima=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
            $sucess = $stm->execute();
            if($sucess){

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                    $MateriaPrima = new MateriaPrima();
                    $MateriaPrima->setId($result['id_materia_prima']);
                    $MateriaPrima->setNome($result['nome']);
                    $MateriaPrima->setDescricao($result['descricao']);
                    $MateriaPrima->setTipoMateria($result['tipo_materia_prima']);
                    $MateriaPrima->setDataValidade($result['validade']);
                    $MateriaPrima->setQuantidade($result['quantidade']);
                    return $MateriaPrima;

                };
                $this->conex->closeDataBase();
            }
        }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_materia_prima where apagado = 0";
            $stm = $conn->prepare($sql);
            $success =$stm->execute();
            if($success){
                $listMateriaPrima = [];

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $MateriaPrima = new MateriaPrima();
                    $MateriaPrima->setId($result['id_materia_prima']);
                    $MateriaPrima->setNome($result['nome']);
                    $MateriaPrima->setDescricao($result['descricao']);
                    $MateriaPrima->setTipoMateria($result['tipo_materia_prima']);
                    $MateriaPrima->setDataValidade($result['validade']);
                    $MateriaPrima->setQuantidade($result['quantidade']);
                    array_push($listMateriaPrima, $MateriaPrima);
                };

                $this->conex->closeDataBase();
                return $listMateriaPrima;
            }else{
                return "Erro";
            };
            
        }

    }



?>

