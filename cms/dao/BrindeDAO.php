<?php

class BrindeDAO{
    private $conex;
    private $brinde;
    public function __construct(){

        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms". '/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    public function insert(Brinde $brinde) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_brinde(nome_brinde,descricao_brinde,ativo,apagado) values(?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $brinde->getTitulo());
        $stm->bindValue(2, $brinde->getConteudo());
        $stm->bindValue(3, $brinde->getAtivo());
        $stm->bindValue(4, $brinde->getApagado());
        $sucess = $stm->execute();
        $this->conex->closeDataBase();
        if ($sucess) {
            echo "Cadastrado com Sucesso";
            return "Sucesso";
        } else {
            echo $sucess;
            return "Erro";
        } 
    }
}