<?php

/* 
    Projeto: MVC página Sobre_Nos.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: CRUD da página Sobre_Nos.
*/

    class Sobre_NosDAO{
    private $conex;
    private $sobre_nos;
    public function __construct() 
    {
        //Recebe a informação da view e envia para o objeto
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        
        //Instancia da conexao com o BD
        $this->conex = new conexaoMysql();
    }
    
     public function insert(Sobre_Nos $sobre_nos) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_conheca_sobre_nos(titulo,texto,ordem,ativo,apagado) values(?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $sobre_nos->getTitulo()); 
        $stm->bindValue(2, $sobre_nos->getTexto());        
        $stm->bindValue(3, $sobre_nos->getOrdem());
        $stm->bindValue(4, $sobre_nos->getAtivo());
        $stm->bindValue(5, $sobre_nos->getApagado());
        $stm->execute();
        $this->conex->closeDataBase();
    }    
    public function update(Sobre_Nos $sobre_nos) {
        $conn = $this->conex->connectDatabase();
        $sql = "update tbl_conheca_sobre_nos set titulo=? texto=? where id_conheca_sobre_nos=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $sobre_nos->getTitulo());
        $stm->bindValue(2, $sobre_nos->getTexto());
        $stm->bindValue(3, $sobre_nos->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }    
    //Atualizar o Sobre_Nos no site ativo
    public function updateAtivo(Sobre_Nos $sobre_nos) 
    {
        $conn = $this->conex->connectDatabase();
        if($sobre_nos->getAtivo()=="0")
        {
            $sobre_nos->setAtivo("1");
        }
        else 
        {
            $sobre_nos->setAtivo("0");
        }
        $sql = "update tbl_conheca_sobre_nos set ativo=? where id_conheca_sobre_nos=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $sobre_nos->getAtivo());
        $stm->bindValue(2, $sobre_nos->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }
        
    public function delete($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "UPDATE tbl_conheca_sobre_nos SET apagado=1 WHERE id_conheca_sobre_nos=?;";
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
       
     public function selectById($id) {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_conheca_sobre_nos where id_conheca_sobre_nos=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $id);        
        $success = $stm->execute();
        $this->conex->closeDataBase();
        if ($success) {
            
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            $Sobre_Nos = new Sobre_Nos();
            $Sobre_Nos->setId($result['id_conheca_sobre_nos']);
            $Sobre_Nos->setTitulo($result['titulo']);
            $Sobre_Nos->setTexto($result['texto']);
            $Sobre_Nos->setAtivo($result['ativo']);
            $Sobre_Nos->setApagado($result['apagado']);
            return $Sobre_Nos;
        }
    }
        
    //Lista todos os Sobre_Nos
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_conheca_sobre_nos where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listSobre_Nos = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $Sobre_Nos = new Sobre_Nos();
                $Sobre_Nos->setId($result['id_conheca_sobre_nos']);
                $Sobre_Nos->setTitulo($result['titulo']);
                $Sobre_Nos->setTexto($result['texto']);
                $Sobre_Nos->setAtivo($result['ativo']);
                $Sobre_Nos->setApagado($result['apagado']);
                array_push($listSobre_Nos, $Sobre_Nos);
            };
            $this->conex -> closeDataBase();
            return $listSobre_Nos;
        } else {
            return "Erro";
        }
    }
}