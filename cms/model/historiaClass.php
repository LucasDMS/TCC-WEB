
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
class Historia{
    private $id;
    private $imagem;
    private $texto;
 
    //ID
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    //Nome
    public function getImagem(){
        return $this->nome;
    }
    public function setImagem($imagem){
        $this->imagem = $imagem;
    }
    //Telefone
    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }
}
?>