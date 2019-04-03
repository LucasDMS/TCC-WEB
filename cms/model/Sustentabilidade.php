<?php
/*
    Projeto: TCC
    Autor:  Lucas
    Data Criação: 03/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de Sustentabilidade
*/
class Sustentabilidade{
    private $id;
    private $texto;
    private $apagado;
    private $ativo;
    private $imagem;
 
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imagem){
        $this->imagem = $imagem;
    }


    public function getApagado(){
        return $this->apagado;
    }
    
    public function setApagado($apagado){
        $this->apagado = $apagado;
    }
    public function getAtivo(){
        return $this->ativo;
    }
    
    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }
}
?>