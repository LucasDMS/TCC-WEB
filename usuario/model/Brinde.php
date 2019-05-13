<?php
/*
    Projeto: TCC
    Autor: Kelvin
    Data Criação: 09/05/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de Brindes
*/
class Brinde{
    private $id;
    private $nome;
    private $descricao;
    private $apagado;
    private $ativo;
 
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getApagado(){
        return $this->apagado;
    }
    
    public function setApagado($apagado){
        $this->apagado = $apagado;
    }
    
    public function getAtivo(){
        return $this->ativo;
    }
    
    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }
}
?>