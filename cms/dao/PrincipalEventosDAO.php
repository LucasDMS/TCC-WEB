<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe dao de eventos
    */
    class PrincipalEventosDAO{
        private $conex;
        private $principal_eventos;
        public function __construct(){
            session_start();
            require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function inserir(Principal_eventos $principal_eventos){
            
            $conn = $this->conex->connectDatabase();
            $sql = "Insert into tbl_texto_principal(texto,tipo_texto,apagado,ativo) VALUES (?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_eventos->getTexto());
            $stm->bindValue(2, $principal_eventos->getTipo_texto());
            $stm->bindValue(3, $principal_eventos->getApagado());
            $stm->bindValue(4, $principal_eventos->getStatus());
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

        public function update(Principal_eventos $principal_eventos){
            $conn = $this->conex->connectDatabase();
            $sql = "UPDATE tbl_texto_principal SET texto = ? where id_texto_principal=?;";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_eventos->getTexto());
            $stm->bindValue(2, $principal_eventos->getId());
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

        public function updateAtivo(Principal_eventos $principal_eventos){
            $conn = $this->conex->connectDatabase();
            
            if($principal_eventos->getStatus()=='1'){
                $principal_eventos->setStatus('0');
            }else if($principal_eventos->getStatus()=='0'){
                $principal_eventos->setStatus('1');
            }

            $sql = "update tbl_texto_principal set ativo=? where id_texto_principal=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, $principal_eventos->getStatus());
            $stm->bindValue(2, $principal_eventos->getId());
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
                    $principal_eventos = new Principal_eventos();
                    $principal_eventos->setId($result['id_texto_principal']);
                    $principal_eventos->setTexto($result['texto']);
                    return $principal_eventos;

                };
                $this->conex->closeDataBase();
            }
        }

        public function selectAll(){
            $conn = $this->conex->connectDatabase();
            $sql = "select * from tbl_texto_principal where apagado = ? and tipo_texto=?";
            $stm = $conn->prepare($sql);
            $stm->bindValue(1, 0);
            $stm->bindValue(2, 'eventos');
            $success =$stm->execute();
            if($success){
                $listPrincipalEventos = [];

                foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                    $principal_eventos = new Principal_eventos();
                    $principal_eventos->setId($result['id_texto_principal']);
                    $principal_eventos->setTexto($result['texto']);
                    $principal_eventos->setStatus($result['ativo']);
                    array_push($listPrincipalEventos, $principal_eventos);
                };

                $this->conex->closeDataBase();
                return $listPrincipalEventos;
            }else{
                return "Erro";
            };
            
        }

    }



?>