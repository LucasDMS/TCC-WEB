<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 27/04/2019
    Objetivo da classe: Classe de Materia prima
*/
class MateriaPrima{
    private $id;
    private $nome;
    private $descricao;
    private $tipoMateriaPrima;
    
    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getTipoMateriaPrima()
    {
        return $this->tipoMateriaPrima;
    }

    public function setTipoMateriaPrima($tipoMateriaPrima)
    {
        $this->tipoMateriaPrima = $tipoMateriaPrima;

        return $this;
    }
}