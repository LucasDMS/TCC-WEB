<?php
/*
        Projeto: TCC
        Autor: Nicolas
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

    //função que cadastra o estabelecimento comercial no banco
    public function inserir(Cadastro_estabelecimento $estabelecimento){
        //conexao com o banco de dados
        $conn = $this->conex->connectDatabase();
    
        //insert na tabela de estabelecimento
        $conn = $this->conex->connectDatabase();
        $sql = "call sp_cadastrar_estabelecimento(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $estabelecimento->getUsuario());
        $stm->bindValue(1, $estabelecimento->getSenha());
        $stm->bindValue(1, $estabelecimento->getEndereco());
        $stm->bindValue(1, $estabelecimento->getBairro());
        $stm->bindValue(1, $estabelecimento->getCidade());
        $stm->bindValue(1, $estabelecimento->getEstado());
        $stm->bindValue(1, $estabelecimento->getEmail());
        $stm->bindValue(1, $estabelecimento->getRazao_social());
        $stm->bindValue(2, $estabelecimento->getNome_fantasia());
        $stm->bindValue(3, $estabelecimento->getCnpj());
        $stm->bindValue(4, $estabelecimento->getNome());
        $stm->bindValue(5, $estabelecimento->getImagem());
        $stm->bindValue(6, $estabelecimento->getTipo_estabelecimento());
        $stm->bindValue(10, $estabelecimento->getAtivo());
        $stm->bindValue(11, 0);
        $stm->bindValue(12, $estabelecimento->getDescricao());
        $sucess = $stm->execute();
        if($sucess){
            return "SUCCESS";
        }else{
            return "ERRO";
        }

        
    }

}

?>