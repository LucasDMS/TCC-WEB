<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 22/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que manipula o banco de dados
    */

    class EnqueteDAO{
        private $conex;

        public function __construct(){
            session_start();
            //Recebe a informação da view e envia para o objeto
            require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
            
            //Instancia da classe de conexao com o BD
            $this->conex = new conexaoMysql();

        }

       // public function selectById($id){
            // $conn = $this->conex->connectDatabase();
            // $sql = "select * from tbl_enquete where id_enquete=?;";
            // $stm = $conn->prepare($sql);
            // $stm->bindValue(1, $id);
            // $sucess = $stm->execute();
            // if($sucess){

            //     foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
            //         $eventos = new Eventos();
            //         $eventos->setId($result['id_eventos']);
            //         $eventos->setNome($result['nome']);
            //         $eventos->setDescricao($result['descricao']);
            //         $eventos->setData($result['data']);
            //         $eventos->setEstado($result['estado']);
            //         $eventos->setCidade($result['cidade']);
            //         $eventos->setHora($result['hora']);
            //         return $eventos;

            //     };
            //     $this->conex->closeDataBase();
            // }
       // }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_enquete where status = ?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 1);
            $success = $stm->execute();
            if($success){
                $listEnquete = [];
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $enquete = new Enquete(); 
                    $enquete->setId($result['id_enquete']);
                    $enquete->setPergunta($result['pergunta']);
                    $enquete->setData($result['data_inicio']);
                    $enquete->setStatus($result['status']);
                    array_push($listEnquete, $enquete);
                };
                $this->conex -> closeDataBase();
                return $listEnquete;

            }else{
                return "Erro";
            }


            
        }


    }

?>