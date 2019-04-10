<?php
/*
    Projeto: MVC página Produto em Destaque.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: página Produto em Destaque.
*/

class Produto_Destaque
{
    //Atributos do Produto_Destaque
    private $id;
    private $texto;
    private $nome;
    private $ativo;
    
    //Pegar a informação e enviar para a view 
    public function getId()
    {
        // retorna o valor do atributo do objeto
        return $this->id;
    }
    
    //Recebe a informação da view e envia para o objeto 
    public function setId($id)
    {
        //Guarda o valor enviado como parametro do metodo
        //no atributo do objeto
        $this->id = $id;
    }
    
    
    public function getTexto()
    {
        return $this->texto;
    }
    
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    public function getAtivo(){
        return $this->ativo;
    }
    
    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }
}
