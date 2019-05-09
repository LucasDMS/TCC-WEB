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
class EstabelecimentoDAO{
    private $conex;

    public function __construct(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/_tcc/cms/db/ConexaoMysql.php');
        $this->conex = new conexaoMysql();
    }

    //função que cadastra o estabelecimento comercial no banco
    public function inserir(Estabelecimento $estabelecimento){
        //conexao com o banco de dados
        $conn = $this->conex->connectDatabase();
    
        //insert na tabela de estabelecimento
        $conn = $this->conex->connectDatabase();
        $sql = "call sp_cadastrar_estabelecimento(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $estabelecimento->getUsuario());
        $stm->bindValue(2, $estabelecimento->getSenha());
        $stm->bindValue(3, $estabelecimento->getEndereco());
        $stm->bindValue(4, $estabelecimento->getBairro());
        $stm->bindValue(5, $estabelecimento->getCidade());
        $stm->bindValue(6, $estabelecimento->getEstado());
        $stm->bindValue(7, $estabelecimento->getEmail());
        $stm->bindValue(8, $estabelecimento->getRazao_social());
        $stm->bindValue(9, $estabelecimento->getNome_fantasia());
        $stm->bindValue(10, $estabelecimento->getCnpj());
        $stm->bindValue(11, $estabelecimento->getNome());
        $stm->bindValue(12, $estabelecimento->getImagem());
        $stm->bindValue(13, $estabelecimento->getTipo_estabelecimento());
        $stm->bindValue(14, $estabelecimento->getRenda());
        $stm->bindValue(15, 0);
        $stm->bindValue(16, $estabelecimento->getDescricao());
        $sucess = $stm->execute();
        if($sucess){
            return "SUCCESS";
        }else{
            return "ERRO";
        }

        
    }
    //Select para todos os UsuarioEstabelecimento
    public function selectAll($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_estabelecimento where id_autenticacao = ?";

        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);
        $success = $stm->execute();
        if ($success) {
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $estabelecimento = new Estabelecimento();
            $estabelecimento->setId($result['id_estabelecimento']); 
            $estabelecimento->setImagem($result['imagem']);
            $estabelecimento->setDescricao($result['descricao']);
            return $estabelecimento;
        }else {
            return "Erro";
        }
    }

}

?>