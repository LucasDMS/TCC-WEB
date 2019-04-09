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

class News_letter{

    private $id;
    private $new_letter;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNew_letter(){
        return $this->new_letter;
    }
    public function setNew_letter($new_letter){
        $this->new_letter = $new_letter;
    }

}


?>