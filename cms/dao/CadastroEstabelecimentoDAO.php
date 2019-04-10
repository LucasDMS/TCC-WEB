<?php

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
        
        
        //insert da tabela de autenticacao
        $sql_autenticacao = "INSERT INTO tbl_autenticacao(usuario,senha,tipo) Values (?,?,?)"; 
        $stm = $conn->prepare($sql_autenticacao);
        $stm->bindValue(1,$estabelecimento->getUsuario());
        $stm->bindValue(2,$estabelecimento->getSenha());
        $stm->bindValue(3,'estabelecimento');
        $success_autenticacao = $stm->execute();
        

        //insert na tabela usuario
        $conn_usuario = $this->conex->connectDatabase();
        $sql_usuario =  "INSERT INTO tbl_usuario (endereco,bairro,cidade,estado,email) Values(?,?,?,?,?)";
        $stm_usuario = $conn_usuario->prepare($sql_usuario);
        $stm_usuario->bindValue(1, $estabelecimento->getEndereco());
        $stm_usuario->bindValue(2, $estabelecimento->getBairro());
        $stm_usuario->bindValue(3, $estabelecimento->getCidade());
        $stm_usuario->bindValue(4, $estabelecimento->getEstado());
        $stm_usuario->bindValue(5, $estabelecimento->getEmail());
        $sucess_usuario = $stm_usuario->execute();
       

        //insert na tabela de estabelecimento
        $conn_estabelecimento = $this->conex->connectDatabase();
        $sql_estabelecimento = "INSERT INTO tbl_estabelecimento(razao_social,nome_fantasia,cnpj,nome_responsavel,imagem,tipo_estabelecimento,renda_media,id_usuario,id_autenticacao,ativo,apagado,descricao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm_estabelecimento = $conn_estabelecimento->prepare($sql_estabelecimento);
        $stm_estabelecimento->bindValue(1, $estabelecimento->getRazao_social());
        $stm_estabelecimento->bindValue(2, $estabelecimento->getNome_fantasia());
        $stm_estabelecimento->bindValue(3, $estabelecimento->getCnpj());
        $stm_estabelecimento->bindValue(4, $estabelecimento->getNome());
        $stm_estabelecimento->bindValue(5, $estabelecimento->getImagem());
        $stm_estabelecimento->bindValue(6, $estabelecimento->getTipo_estabelecimento());
        $stm_estabelecimento->bindValue(7, $estabelecimento->getRenda());
        $stm_estabelecimento->bindValue(8, 1);
        $stm_estabelecimento->bindValue(9, 1);
        $stm_estabelecimento->bindValue(10, $estabelecimento->getAtivo());
        $stm_estabelecimento->bindValue(11, 0);
        $stm_estabelecimento->bindValue(12, $estabelecimento->getDescricao());
        $sucess = $stm_estabelecimento->execute();
        if($sucess){
            return "SUCCESS";
        }else{
            return "ERRO";
        }

        
    }

}

?>