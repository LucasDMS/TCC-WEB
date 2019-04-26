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
        private $ultimoid;
        private $ultimoid2;
        private $ultimoid3;

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

       //inserir enquete no banco 
        public function inserirEnquete(Enquete $enquete){
            $conn = $this->conex->connectDatabase();
            $sql = "call sp_cadastro_enquete(?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1,$enquete->getPergunta());
            $stm->bindValue(2,$enquete->getData());
            $stm->bindValue(3,$enquete->getResposta());
            $sucess = $stm->execute();   
            
            $this->conex->closeDataBase();
            if($sucess){
                echo "Cadastrado com sucesso!";
                return "Sucesso";
            }else{
                echo $sucess;
                return "Erro";
            }
        }

        //select de todos as perguntas
        public function selectPerguntas(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_enquete where apagado = ?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 0);  
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

        //select de todos as respostas
        public function selectResposta(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from vw_listar_enquete";
            $stm = $conn->prepare($sql);
            $success = $stm->execute();
            if($success){
                $listEnquete = [];
                foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $enquete = new Enquete(); 
                    $enquete->setId($result['id_enquete']);
                    $enquete->setResposta($result['respostas']);
                    $enquete->setVotos($result['votos']);
                    array_push($listEnquete, $enquete);
                };
                $this->conex -> closeDataBase();
                return $listEnquete;

            }else{
                return "Erro";
            }  
        }

        //atualizar o banco -> desativando ou ativando enquete
        public function updateAtivo(Enquete $enquete){
            $conn = $this->conex->connectDatabase();
            if($enquete->getStatus()=='1'){
                $enquete->setStatus('0');
            }else if($enquete->getStatus()=='0'){
                $enquete->setStatus('1');
            }
            $sql = "UPDATE tbl_enquete SET status = ? where id_enquete=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $enquete->getStatus());
            $stm->bindValue(2, $enquete->getId());
            $success = $stm->execute();
            if($success){
                echo "Atualizado";
                return "Sucesso";
            }else{
                echo "Erro";
                return "Erro";
            }
        }

        //deletar enquete
        public function delete($id){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_enquete SET apagado = ? WHERE id_enquete = ?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 1);
            $stm->bindValue(2, $id);
            $success = $stm->execute();
            if($success){
                echo "Excluido";
            }else{
                echo "ERRO";
            }
        }


    }

?>