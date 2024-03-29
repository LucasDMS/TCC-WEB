<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 29/04/2019
    Objetivo da classe: Classe de Prateleira
*/
class Prateleira{
    private $id;
    private $prateleira;
    private $capacidade;
    private $quantidade;
    private $idSetores;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getPrateleira()
    {
        return $this->prateleira;
    }
    public function setPrateleira($prateleira)
    {
        $this->prateleira = $prateleira;
        return $this;
    }

    public function getCapacidade()
    {
        return $this->capacidade;
    }

    public function setCapacidade($capacidade)
    {
        $this->capacidade = $capacidade;

        return $this;
    }

    
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }
    public function getIdSetores()
    {
        return $this->idSetores;
    }

    public function setIdSetores($idSetores)
    {
        $this->idSetores = $idSetores;

        return $this;
    }
}
?>