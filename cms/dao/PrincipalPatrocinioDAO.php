<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe dao de patrocinio
    */
    class PrincipalPatrocinioDAO{
        private $conex;
        private $principal_video;
        public function __construct(){
            session_start();
            require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function inserir(Principal_patrocinio $principal_patrocinio){
            $conn = $this->conex->connectDatabase();
            $sql = "Insert into tbl_texto_principal(texto,tipo_texto,apagado,ativo) VALUES (?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_patrocinio->getTexto());
            $stm->bindValue(2, $principal_patrocinio->getTipo_texto());
            $stm->bindValue(3, $principal_patrocinio->getApagado());
            $stm->bindValue(4, $principal_patrocinio->getStatus());
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

        public function update(Principal_patrocinio $principal_patrocinio){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_texto_principal SET texto = ? where id_texto_principal=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_patrocinio->getTexto());
            $stm->bindValue(2, $principal_patrocinio->getId());
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

        public function updateAtivo(Principal_patrocinio $principal_patrocinio){
            $conn = $this->conex->connectDatabase();
            
            if($principal_patrocinio->getStatus()=='1'){
                $principal_patrocinio->setStatus('0');
            }else if($principal_patrocinio->getStatus()=='0'){
                $principal_patrocinio->setStatus('1');
            }

            $sql = "update tbl_texto_principal set ativo=? where id_texto_principal=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_patrocinio->getStatus());
            $stm->bindValue(2, $principal_patrocinio->getId());
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
                    $principal_patrocinio = new Principal_patrocinio();
                    $principal_patrocinio->setId($result['id_texto_principal']);
                    $principal_patrocinio->setTexto($result['texto']);
                    return $principal_patrocinio;

                };
                $this->conex->closeDataBase();
            }
        }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_texto_principal where apagado = ? and tipo_texto=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 0);
            $stm->bindValue(2, 'patrocinio');
            $success =$stm->execute();
            if($success){
                $listPrincipalPatrocinio = [];

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $principal_patrocinio = new Principal_patrocinio();
                    $principal_patrocinio->setId($result['id_texto_principal']);
                    $principal_patrocinio->setTexto($result['texto']);
                    $principal_patrocinio->setStatus($result['ativo']);
                    array_push($listPrincipalPatrocinio, $principal_patrocinio);
                };

                $this->conex->closeDataBase();
                return $listPrincipalPatrocinio;
            }else{
                return "Erro";
            };
            
        }

    }



?>