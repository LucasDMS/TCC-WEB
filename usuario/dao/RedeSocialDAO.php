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
class CadastroEstabelecimentoDAO{
    private $conex;

    public function __construct(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    public function inserir(CadastroEstabelecimento $estabelecimento){
        
    }
}

?>