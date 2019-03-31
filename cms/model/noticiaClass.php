
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
class Historia{
    private $id;
    private $texto;
    private $status;
    private $ordem;
 
    //ID
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    //Nome
    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }
    //Nome
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    //Nome
    public function getOrdem(){
        return $this->ordem;
    }
    public function setOrdem($ordem){
        $this->ordem = $ordem;
    }
}
?>