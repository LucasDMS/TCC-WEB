<?php

/* 
    Projeto: MVC página SobreNos.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: CRUD da página SobreNos.
*/

    class SobreNosDAO{
    private $conex;
    private $SobreNos;
    public function __construct() 
    {
        //Recebe a informação da view e envia para o objeto
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms".'/db/ConexaoMysql.php');
        
        //Instancia da conexao com o BD
        $this->conex = new conexaoMysql();
    }
    
     public function insert(SobreNos $SobreNos) {
        $conn = $this->conex->connectDatabase();
        $sql = "insert into tbl_conheca_sobre_nos(titulo,texto,ordem,ativo,apagado) values(?,?,?,?,?);";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $SobreNos->getTitulo()); 
        $stm->bindValue(2, $SobreNos->getTexto());        
        $stm->bindValue(3, $SobreNos->getOrdem());
        $stm->bindValue(4, $SobreNos->getAtivo());
        $stm->bindValue(5, $SobreNos->getApagado());
        $stm->execute();
        $this->conex->closeDataBase();
    }    
    public function update(SobreNos $SobreNos) {
        $conn = $this->conex->connectDatabase();
        $sql = "update tbl_conheca_sobre_nos set titulo=? texto=? where id_conheca_sobre_nos=?";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $SobreNos->getTitulo());
        $stm->bindValue(2, $SobreNos->getTexto());
        $stm->bindValue(3, $SobreNos->getId());
        $stm->execute();
        $this->conex->closeDataBase();
    }    
    //Atualizar o Sobre_Nos no site ativo
    public function updateAtivo(SobreNos $SobreNos) 
    {
        $conn = $this->conex->connectDatabase();
        if($SobreNos->getAtivo()=="0")
        {
            $SobreNos->setAtivo("1");
        }
        else 
        {
            $SobreNos->setAtivo("0");
        }
        $sql = "update tbl_conheca_sobre_nos set ativo=? where id_conheca_sobre_nos=?;";
        $stm = $conn->prepare($sql);
        $stm->bindValue(1, $SobreNos->getAtivo());
        $stm->bindValue(2, $SobreNos->getId());
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
            
            $SobreNos = new SobreNos();
            $SobreNos->setId($result['id_conheca_sobre_nos']);
            $SobreNos->setTitulo($result['titulo']);
            $SobreNos->setTexto($result['texto']);
            $SobreNos->setAtivo($result['ativo']);
            $SobreNos->setApagado($result['apagado']);
            return $SobreNos;
        }
    }
        
    //Lista todos os Sobre_Nos
    public function selectAll() {
        $conn = $this->conex->connectDatabase();
        $sql = "select * from tbl_conheca_sobre_nos where apagado = 0";
        $stm = $conn->prepare($sql);
        $success = $stm->execute();
        if ($success) {
            $listSobreNos = [];
            foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $result) {
                $SobreNos = new SobreNos();
                $SobreNos->setId($result['id_conheca_sobre_nos']);
                $SobreNos->setTitulo($result['titulo']);
                $SobreNos->setTexto($result['texto']);
                $SobreNos->setAtivo($result['ativo']);
                $SobreNos->setApagado($result['apagado']);
                array_push($listSobreNos, $SobreNos);
            };
            $this->conex -> closeDataBase();
            return $listSobreNos;
        } else {
            return "Erro";
        }
    }
}