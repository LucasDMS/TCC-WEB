<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 29/04/2019
    Objetivo da classe: Classe de Produto
*/
class Produto{
    private $id;
    private $prateleira;
    private $idSetor;

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

    public function getIdSetor()
    {
        return $this->idSetor;
    }

    public function setIdSetor($idSetor)
    {
        $this->idSetor = $idSetor;

        return $this;
    }
}
?>