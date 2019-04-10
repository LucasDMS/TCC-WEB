<?php
/*
    Projeto: TCC
    Autor:  Lucas
    Data Criação: 03/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de Sustentabilidade Imagem
*/
class SustentabilidadeImagem{
    private $id;
    private $imagem;
 
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imagem){
        $this->imagem = $imagem;
    }



}
?>