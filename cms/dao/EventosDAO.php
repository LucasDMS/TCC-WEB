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
            $sql = "Insert into tbl_nossos_eventos(nome,descricao,data,estado,cidade,hora_evento,status) VALUES (?,?,?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $eventos->getNome());
            $stm->bindValue(2, $eventos->getDescricao());
            $stm->bindValue(3, $eventos->getData());
            $stm->bindValue(4, $eventos->getEstado());
            $stm->bindValue(5, $eventos->getCidade());
            $stm->bindValue(6, $eventos->getHora()); 
            $stm->bindValue(7, $eventos->getStatus());
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

        public function update(){

        }

        public function delete(){

        }

        public function updateAtivo(){

        }

        public function selectById(){

        }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_nossos_eventos";
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