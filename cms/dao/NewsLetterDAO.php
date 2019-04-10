<?php 
class NewsLetterDao{
    private $conex;
    private $newLetter;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_news_letter";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listNewsLetter = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $NewsLetter = new News_letter();
                $NewsLetter->setId($result['id_news_letter']);
                $NewsLetter->setNew_letter($result['email']);
                array_push($listNewsLetter, $NewsLetter);
            };

            $this->conex -> closeDataBase();
            return $listNewsLetter;
        } else {
            return "Erro";
        }
    }
}
?> 