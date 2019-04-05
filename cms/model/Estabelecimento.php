<?php
/* 
    Projeto: Exercicio de MVC em tela de Estabelecimento
    Autor: Kelvin
    Data Criação: 04/04/2019
    Objetivo da classe: Classe de Estabelecimento
*/

class Estabelecimento{
    
    private $id;
    private $texto;
    private $nome;
    private $ativo;
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    
}