<?php 
class NewsLetterDao{
    private $conex;
    private $NewLetter;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    
    public function insert(NewsLetter $NewsLetter) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_news_letter(email) values(?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $NewsLetter->getNewLetter());        
      
        $stm->execute();
        $this->conex->closeDataBase();
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_news_letter";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listNewsLetter = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $NewsLetter = new NewsLetter();
                $NewsLetter->setId($result['id_news_letter']);
                $NewsLetter->setNewLetter($result['email']);
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