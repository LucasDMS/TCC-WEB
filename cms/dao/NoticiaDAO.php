<?php 
class NoticiaDAO{
    private $conex;
    private $noticia;
    public function __construct() {
        require_once($_SESSION['PATH'].'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Noticia $noticia) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_noticias_fique_por_dentro(titulo,texto,apagado,ordem,ativo) values(?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $noticia->getTitulo());
        $stm->bindValue(2, $noticia->getConteudo());
        $stm->bindValue(3, $noticia->getApagado());
        $stm->bindValue(4, $noticia->getOrdem());
        $stm->bindValue(5, $noticia->getAtivo());
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function update(Noticia $noticia) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_noticias_fique_por_dentro SET titulo = ?, texto = ? WHERE id_noticias_fique_por_dentro=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $noticia->getTitulo());
        $stm->bindValue(2, $noticia->getConteudo());
        $stm->bindValue(3, $noticia->getId());
        $success = $stm->execute();
        echo $success;
        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function delete($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_noticias_fique_por_dentro SET apagado = 1 WHERE id_noticias_fique_por_dentro=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        echo $success;
        $this->conex->closeDataBase();
        if ($success) {
            echo $success;
            return "Sucesso";
        } else {
            echo $success;
            return "Erro";
        }
    }
    public function updateAtivo(Noticia $noticia) {

        $conn = $this->conex->connectDatabase();

        if($noticia->getAtivo()=="0"){
            $noticia->setAtivo("1");
        }
        else {
            $noticia->setAtivo("0");
        }

        $sql = "update tbl_noticias_fique_por_dentro set ativo=? where id_noticias_fique_por_dentro=?";

        $stm = $conn->prepare($sql);

        $stm->bindValue(1, $noticia->getAtivo());
        $stm->bindValue(2, $noticia->getId());

        $stm->execute();

        $this->conex->closeDataBase();
    }
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_noticias_fique_por_dentro where id_noticias_fique_por_dentro= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $noticia = new Noticia();
                $noticia->setId($result['id_noticias_fique_por_dentro']);
                $noticia->setTitulo($result['titulo']);
                $noticia->setConteudo($result['texto']);
                $noticia->setApagado($result['apagado']);
                $noticia->setOrdem($result['ordem']);
                $noticia->setAtivo($result['ativo']);
                return $noticia;
            };
            $this->conex -> closeDataBase();
        }
    }
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_noticias_fique_por_dentro where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {

            $listNoticia = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $noticia = new Noticia();
                $noticia->setId($result['id_noticias_fique_por_dentro']);
                $noticia->setTitulo($result['titulo']);
                $noticia->setConteudo($result['texto']);
                $noticia->setApagado($result['apagado']);
                $noticia->setOrdem($result['ordem']);
                $noticia->setAtivo($result['ativo']);
                array_push($listNoticia, $noticia);
            };

            $this->conex -> closeDataBase();
            return $listNoticia;
        } else {
            return "Erro";
        }
    }
}
?>