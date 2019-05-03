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

       public function selectById($id){
            $conn = $this->conex->connectDatabase();
            $sql = "SELECT 
            `e`.`id_enquete` AS `id_enquete`,
            `e`.`pergunta` AS `pergunta`,
            `e`.`status` AS `status`,
            `r`.`id_resposta` AS `id_resposta`,
            `e`.`data_inicio` AS `data_inicio`,
            `r`.`respostas` AS `respostas`,
            `eq`.`votos` AS `votos`
        FROM
            ((`tbl_enquete` `e`
            JOIN `tbl_resposta` `r`)
            JOIN `tbl_enquete_resposta` `eq`)
        WHERE
            ((`eq`.`id_enquete` = `e`.`id_enquete`)
                AND (`eq`.`id_resposta` = `r`.`id_resposta`)
                AND (`e`.`id_enquete` = `eq`.`id_enquete`)
                and (e.`id_enquete` = ".$id."));";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
            $sucess = $stm->execute();
            if($sucess){
                $listEnquete = [];
                foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                    $enquete = new Enquete();
                    $enquete->setResposta($result['respostas']);
                    $enquete->setStatus($result['status']);
                    array_push($listEnquete, $enquete);

                };
                $this->conex->closeDataBase();
                return $listEnquete;
            }
       }

       public function selectByIdPergunta($id){
        $conn = $this->conex->connectDatabase();
        $sql = "SELECT tbl_enquete.* FROM tbl_enquete WHERE id_enquete = ?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $sucess = $stm->execute();
        if($sucess){
            foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                $enquete = new Enquete();
                $enquete->setId($result['id_enquete']);
                $enquete->setPergunta($result['pergunta']);
                $enquete->setData($result['data_inicio']);
                return $enquete;

            };
            $this->conex->closeDataBase();
            
        }
       }

       //inserir enquete no banco 
        public function inserirEnquete(Enquete $enquete){
        
            //loop para pegar inserir todas as respostas
            for($i = 0; $i<count($enquete->getResposta()); $i++){
                $conn = $this->conex->connectDatabase();
                $sql = "call sp_cadastro_enquete(?,?,?)";
                $stm = $conn->prepare($sql);
                $stm->bindValue(1,$enquete->getPergunta());
                $stm->bindValue(2,$enquete->getData());
                $stm->bindValue(3,$enquete->getResposta()[$i]);
                $sucess = $stm->execute();       
            }
            //fechando conexão
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
            $sql = "select * from tbl_enquete";
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
            $sql2 = "DELETE FROM tbl_enquete_resposta WHERE id_enquete = ?";
            $stm2 = $conn->prepare($sql2);
            $stm2->bindValue(1, $id);
            $stm2->execute();
            
            $conn = $this->conex->connectDatabase();
            $sql = "DELETE FROM tbl_enquete WHERE id_enquete = ?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
            $success = $stm->execute();
            if($success){
                echo "Excluido";
            }else{
                echo "ERRO";
            }
        }

        public function update(Enquete $enquete){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_enquete SET pergunta=?,data_inicio=? where id_enquete=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $enquete->getPergunta());
            $stm->bindValue(2, $enquete->getData());
            $stm->bindValue(3, $enquete->getId());
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