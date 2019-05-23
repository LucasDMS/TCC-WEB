<?php 
class TextoPrincipalDAO{

    private $conex;
    private $TextoPrincipal;
    public function __construct() {

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms".'/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    //Função de update no banco
    public function update(TextoPrincipal $TextoPrincipal) {
        $conn = $this->conex->connectDatabase();

        $sql = "UPDATE tbl_texto_principal SET titulo = ?,texto = ?  WHERE id_texto_principal=?;";
        $stm = $conn->prepare($sql);
        //Setando os valores da query
        $stm->bindValue(1, $TextoPrincipal->getTitulo());
        $stm->bindValue(2, $TextoPrincipal->getTexto());
        $stm->bindValue(3, $TextoPrincipal->getId());
       
        //Executando a query
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
  
    
    public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_texto_principal where id_texto_principal= ?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
           
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $TextoPrincipal = new TextoPrincipal();
                $TextoPrincipal->setId($result['id_texto_principal']);
                $TextoPrincipal->setTitulo($result['titulo']);
                $TextoPrincipal->setTexto($result['texto']);
                $TextoPrincipal->setTipoTexto($result['tipo_texto']);
                return $TextoPrincipal;
            };
            $this->conex -> closeDataBase();
        }
    }
    //Selecionando todos os registros do banco 
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_texto_principal";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            //Criando uma lista com os dados
            $listTextoPrincipal = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $TextoPrincipal = new TextoPrincipal();
                $TextoPrincipal->setId($result['id_texto_principal']);
                $TextoPrincipal->setTitulo($result['titulo']);
                $TextoPrincipal->setTexto($result['texto']);
                $TextoPrincipal->setTipoTexto($result['tipo_texto']);
                array_push($listTextoPrincipal, $TextoPrincipal);
            };

            $this->conex -> closeDataBase();
            //retornando a lista
            return $listTextoPrincipal;
        } else {
            return "Erro";
        }
    }
}
?>