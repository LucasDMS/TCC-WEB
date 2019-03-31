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
    private $status;
 
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

    public function getStatus(){
        return $this->status;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
}
?>