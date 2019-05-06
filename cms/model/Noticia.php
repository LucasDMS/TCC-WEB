<?php
/*
    Projeto: TCC
    Autor: Rafael
    Data Criação: 30/03/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de contatos
*/
class Noticia{
    private $id;
    private $titulo;
    private $conteudo;
    private $apagado;
    private $ordem;
    private $ativo;
 
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
    public function getConteudo(){
        return $this->conteudo;
    }
    public function setConteudo($conteudo){
        $this->conteudo = $conteudo;
    }
    public function getApagado(){
        return $this->apagado;
    }
    
    public function setApagado($apagado){
        $this->apagado = $apagado;
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
}
?>