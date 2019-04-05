<?php

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
        $stm->bindValue(3, 1);
        $stm->bindValue(4, 0);
        $sucess = $stm->execute();
        
        if($sucess){

        }else{
            
        }
        


    }


}

?>