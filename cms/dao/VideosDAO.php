<?php
 /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 06/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de contatos
    */
class VideosDAO{
    private $conex;


    public function __construct(){
        session_start();
        require_once($_SESSION['PATH'].'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    public function selectAll(){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_videos where apagado = 0";
        $stm = $conn->prepare($sql);
        $success =$stm->execute();
        if($success){
            $listVideos = [];

            foreach($stm->fetchAll(PDO::FETCH_ASSOC) as $result){
                $videos = new Videos();
                $videos->setId($result['id_videos']);
                $videos->setTitulo($result['titulo']);
                $videos->setLink($result['video']);
                $videos->setStatus($result['status']);
                array_push($listVideos, $videos);
            };

            $this->conex->closeDataBase();
            return $listVideos;
        }else{
            return "Erro";
        };
    }

    public function inserir(Videos $videos){
        $conn = $this->conex->connectDatabase();
        $sql = "insert INTO tbl_videos (video, titulo, status,apagado)Value (?,?,?,?) ";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $videos->getLink());
        $stm->bindValue(2, $videos->getTitulo());
        $stm->bindValue(3, $videos->getStatus());
        $stm->bindValue(4, $videos->getApagado());
        $sucess = $stm->execute();
        
        if($sucess){
            echo $sucess;
            return "Sucesso";
        }else{
            echo $sucess;
            return "Erro";
        }
    }

    //function para deletar registro
    public function delete($id){
        //abrindo conexão com o banco
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_videos SET apagado = ? where id_videos=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, 1);
        $stm->bindValue(2, $id);
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

    public function update(Videos $Videos){
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_videos SET titulo = ?, video = ? where id_videos=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Videos->getTitulo());
        $stm->bindValue(2, $Videos->getLink());
        $stm->bindValue(3, $Videos->getId());
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

    public function selectById($id){
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_videos where id_videos=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $sucess = $stm->execute();
        if($sucess){

            foreach($stm->fetchAll(PDO::FETCH_ASSOC) AS $result){
                $Videos = new Videos();
                $Videos->setId($result['id_videos']);
                $Videos->setTitulo($result['titulo']);
                $Videos->setLink($result['video']);
                return $Videos;
                    
            };
            $this->conex->closeDataBase();
        }
    }

    public function updateAtivo(Videos $Videos){
        $conn = $this->conex->connectDatabase();
        
        if($Videos->getStatus()=='1'){
            $Videos->setStatus('0');
            echo("0");
        }else if($Videos->getStatus()=='0'){
            $Videos->setStatus('1');
            echo("1");
        }

        $sql = "update tbl_videos set status=? where id_videos=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $Videos->getStatus());
        $stm->bindValue(2, $Videos->getId());
        $stm->execute();

        
        $this->conex->closeDataBase();
    }

}

?>