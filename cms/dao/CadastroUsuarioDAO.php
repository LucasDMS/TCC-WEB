<?php
/*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 11/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que manipula o banco de dados
    */
class CadastroUsuarioDAO{
    private $conex;

    public function __construct(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/cms/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();

    }

    //função que cadastra o Usuario comercial no banco
    public function inserir(CadastroUsuario $usuario){
        //conexao com o banco de dados
        $conn = $this->conex->connectDatabase();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
           
        //insert da tabela de autenticacao
        $sql = "call sp_cadastrar_usuario(?,?,?,?,?,?,?,?,?,?)"; 
        $stm = $conn->prepare($sql);
        $stm->bindValue(1,$usuario->getLogin());
        $stm->bindValue(2,$usuario->getSenha());
        $stm->bindValue(3,$usuario->getEndereco());
        $stm->bindValue(4,$usuario->getBairro());
        $stm->bindValue(5,$usuario->getCidade());
        $stm->bindValue(6,$usuario->getEstado());
        $stm->bindValue(7,$usuario->getEmail());
        $stm->bindValue(8,$usuario->getNome());
        $stm->bindValue(9,$usuario->getCpf());
        $stm->bindValue(10,$usuario->getSexo());
        $success = $stm->execute();
        if($success){
            echo "{ sucesso:true }";
            return "SUCCESS";
        } else {
            echo "{ sucesso:false }";
            return "ERRO";
        }

        
    }

}

?>