<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 27/04/2019
    Objetivo da classe: Classe de setores
*/
class Setor{
    private $id;
    private $capacidade;
    private $rua;
    private $prateleira;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getRua()
    {
        return $this->rua;
    }

    public function setRua($rua)
    {
        $this->rua = $rua;

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
}