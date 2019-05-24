<?php
/*
    Projeto: TCC
    Autor: Rafael
    Data Criação: 10/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: class que manipula o banco de dados
*/
class PostDAO{

    private $conex;
    private $Post;

    public function __construct(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/cms/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    public function selectAll(){
        $conn = $this->conex->connectDatabase();

        $sql = "select * from vw_listar_posts where ativo = 1";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();

        if ($success) {
            //Criando uma lista com os dados
            $listPost = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Post = new Post();
                $Post->setId(intval($result['id_post']));
                $Post->setAutor($result['autor']);
                $Post->setAutorFoto($result['autor_foto']);
                $Post->setTexto($result['texto']);      
                $Post->setDtPublicacao($result['data_publicacao']);
                $Post->setAprovado($result['aprovado']);
                $Post->setAtivo($result['ativo']);
                $Post->setLikes($result['likes']);
                
                array_push($listPost, $Post);
            };

            $this->conex -> closeDataBase();
            //retornando a lista
            return $listPost;
        } else {
            return "Erro";
        }
    }
}

?>