<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de contatos
    */
    class EventosDAO{
        private $conex;
        private $eventos;
        public function __construct(){
            session_start();
            require_once($_SESSION['PATH'].'/db/ConexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function inserir(Eventos $eventos){
            $conn = $this->conex->connectDatabase();
            $sql = "Insert into tbl_nossos_eventos(nome,descricao,data,estado,cidade,hora_evento,status,apagado) VALUES (?,?,?,?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $eventos->getNome());
            $stm->bindValue(2, $eventos->getDescricao());
            $stm->bindValue(3, $eventos->getData());
            $stm->bindValue(4, $eventos->getEstado());
            $stm->bindValue(5, $eventos->getCidade());
            $stm->bindValue(6, $eventos->getHora()); 
            $stm->bindValue(7, $eventos->getStatus());
            $stm->bindValue(8, 0);
            $sucess = $stm->execute();
            echo("oioio");

            $this->conex->closeDataBase();
            if($sucess){
                echo $sucess;
                return "Sucesso";
            }else{
                echo $sucess;
                return "Erro";
            }
        }

        public function update(Eventos $eventos){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_nossos_eventos SET nome = ?, descricao = ?, estado = ?, cidade = ?, hora_evento = ? where id_nossos_eventos=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $eventos->getNome());
            $stm->bindValue(2, $eventos->getDescricao());
            //$stm->bindValue(3, $eventos->getData());
            $stm->bindValue(3, $eventos->getEstado());
            $stm->bindValue(4, $eventos->getCidade());
            $stm->bindValue(5, $eventos->getHora());
            $stm->bindValue(6, $eventos->getId());
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
            $sql = "UPDATE tbl_nossos_eventos SET apagado = 1 where id_nossos_eventos = ?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
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

        public function updateAtivo(){

        }

        public function selectById($id){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_nossos_eventos where id_nossos_eventos=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
            $sucess = $stm->execute();
            if($sucess){

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                    $eventos = new Eventos();
                    $eventos->setId($result['id_nossos_eventos']);
                    $eventos->setNome($result['nome']);
                    $eventos->setDescricao($result['descricao']);
                    $eventos->setData($result['data']);
                    $eventos->setEstado($result['estado']);
                    $eventos->setCidade($result['cidade']);
                    $eventos->setHora($result['hora_evento']);
                    return $eventos;

                };
                $this->conex->closeDataBase();
            }
        }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_nossos_eventos where apagado = 0";
            $stm = $conn->prepare($sql);
            $success =$stm->execute();
            if($success){
                $listEventos = [];

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $eventos = new Eventos();
                    $eventos->setId($result['id_nossos_eventos']);
                    $eventos->setNome($result['nome']);
                    $eventos->setDescricao($result['descricao']);
                    $eventos->setData($result['data']);
                    $eventos->setEstado($result['estado']);
                    $eventos->setCidade($result['cidade']);
                    $eventos->setHora($result['hora_evento']);
                    $eventos->setStatus($result['status']);
                    array_push($listEventos, $eventos);
                };

                $this->conex->closeDataBase();
                return $listEventos;
            }else{
                return "Erro";
            };
            
        }

    }



?>