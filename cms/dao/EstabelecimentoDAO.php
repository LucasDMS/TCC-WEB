<?php

/* 
    Projeto: MVC página Estabelecimento.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: CRUD da página Estabelecimento.
*/

class EstabelecimentoDAO {
    private $conex;
    private $estabelecimento;
    public function __construct() 
    {
        //Recebe a informação da view e envia para o objeto
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        
        //Instancia da classe de conexao com o BD
        $this->conex = new conexaoMysql();
    }
    
    //Atualizar o Estabelecimento no site ativo
    public function updateAtivo(Estabelecimento $estabelecimento) {
        $conn = $this->conex->connectDatabase();
        if($estabelecimento->getAtivo()=="0"){
            $estabelecimento->setAtivo("1");
        }
        else {
            $estabelecimento->setAtivo("0");
        }
        $sql = "update tbl_estabelecimento set ativo=? where id_estabelecimento=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $estabelecimento->getAtivo());
        $stm->bindValue(2, $estabelecimento->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }

    //Lista todos os Estabelecimentos
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_estabelecimento where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listEstabelecimento = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Estabelecimento = new Estabelecimento();
                $Estabelecimento->setId($result['id_estabelecimento']);
                $Estabelecimento->setTexto($result['descricao']);
                $Estabelecimento->setNome($result['nome_fantasia']);
                $Estabelecimento->setAtivo($result['ativo']);
                array_push($listEstabelecimento, $Estabelecimento);
            };
            $this->conex -> closeDataBase();
            return $listEstabelecimento;
        } else {
            return "Erro";
        }
    }
}