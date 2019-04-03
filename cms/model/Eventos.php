<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de contatos
    */
        
class Eventos{
    private $id;
    private $nome;
    private $descricao;
    private $data;
    private $estado;
    private $cidade;
    private $status;
    private $hora;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id= $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome=$nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao=$descricao;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data=$data;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado=$estado;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade=$cidade;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status=$status;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora=$hora;
    }


}



?>