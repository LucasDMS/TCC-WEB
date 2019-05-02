<?php
    /* 
    Projeto: TCC
    Autor: Nicolas
    Data Criação: 27/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: class que guarda os dados que serão manipulados.
*/

class Setores{

    private $id;
    private $rua;
    private $prateleira;
    private $capacidade;
    private $apagado;


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getRua(){
        return $this->rua;
    }
 
    public function setRua($rua){
        $this->rua = $rua;
        return $this;
    }

    public function getPrateleira(){
        return $this->prateleira;
    }

    public function setPrateleira($prateleira){
        $this->prateleira = $prateleira;
        return $this;
    }
 
    public function getCapacidade(){
        return $this->capacidade;
    }
 
    public function setCapacidade($capacidade){
        $this->capacidade = $capacidade;
        return $this;
    }
 
    public function getApagado(){
        return $this->apagado;
    }
 
    public function setApagado($apagado){
        $this->apagado = $apagado;
        return $this;
    }
}

?>