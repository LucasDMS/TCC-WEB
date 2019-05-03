<?php
    /*
    Projeto: TCC
    Autor: Rafael
    Data Criação: 09/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de model para news letter
*/

class NewsLetter{

    private $id;
    private $newLetter;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNewLetter(){
        return $this->newLetter;
    }
    public function setNewLetter($newLetter){
        $this->newLetter = $newLetter;
    }

}


?>