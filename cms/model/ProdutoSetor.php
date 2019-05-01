<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 28/04/2019
    Objetivo da classe: Classe de Produto Setor
*/
class ProdutoSetor{
    private $id;
    private $idProduto;
    private $idSetor;
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

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;

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