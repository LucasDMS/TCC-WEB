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

        public function inserir(){

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