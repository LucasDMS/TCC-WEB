<?php
/*
    Projeto: Exercicio de MVC em tela de Contatos
    Autor: Lucas
    Data Criação: 11/03/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de contatos
*/
class SobreNos{

    private $id;
    private $titulo;
    private $texto;
    private $ordem;
    private $ativo;
    private $apagado;
 
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTexto(){
        return $this->texto;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function getOrdem(){
        return $this->ordem;
    }

    public function setOrdem($ordem){
        $this->ordem = $ordem;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function getApagado(){
        return $this->apagado;
    }

    public function setApagado($apagado){
        $this->apagado = $apagado;
    }
}
?>