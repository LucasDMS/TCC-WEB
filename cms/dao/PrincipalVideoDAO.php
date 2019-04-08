<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe dao de video
    */
    class PrincipalVideoDAO{
        private $conex;
        private $principal_video;
        public function __construct(){
            session_start();
            require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function inserir(Principal_video $principal_video){
            $conn = $this->conex->connectDatabase();
            $sql = "Insert into tbl_texto_principal(texto,tipo_texto,apagado,ativo) VALUES (?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_video->getTexto());
            $stm->bindValue(2, $principal_video->getTipo_texto());
            $stm->bindValue(3, $principal_video->getApagado());
            $stm->bindValue(4, $principal_video->getStatus());
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

        public function update(Principal_video $principal_video){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_texto_principal SET texto = ? where id_texto_principal=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_video->getTexto());
            $stm->bindValue(2, $principal_video->getId());
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
            $sql = "UPDATE tbl_texto_principal SET apagado = ? where id_texto_principal = ?;";
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

        public function updateAtivo(Principal_video $principal_video){
            $conn = $this->conex->connectDatabase();
            
            if($principal_video->getStatus()=='1'){
                $principal_video->setStatus('0');
            }else if($principal_video->getStatus()=='0'){
                $principal_video->setStatus('1');
            }

            $sql = "update tbl_texto_principal set ativo=? where id_texto_principal=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_video->getStatus());
            $stm->bindValue(2, $principal_video->getId());
            $stm->execute();

            $this->conex->closeDataBase();
        }

        public function selectById($id){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_texto_principal where id_texto_principal=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $id);
            $sucess = $stm->execute();
            if($sucess){

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                    $principal_video = new Principal_video();
                    $principal_video->setId($result['id_texto_principal']);
                    $principal_video->setTexto($result['texto']);
                    return $principal_video;

                };
                $this->conex->closeDataBase();
            }
        }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_texto_principal where apagado = ? and tipo_texto=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 0);
            $stm->bindValue(2, 'video');
            $success =$stm->execute();
            if($success){
                $listPrincipalVideo = [];

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $principal_video = new Principal_video();
                    $principal_video->setId($result['id_texto_principal']);
                    $principal_video->setTexto($result['texto']);
                    $principal_video->setStatus($result['ativo']);
                    array_push($listPrincipalVideo, $principal_video);
                };

                $this->conex->closeDataBase();
                return $listPrincipalVideo;
            }else{
                return "Erro";
            };
            
        }

    }



?>