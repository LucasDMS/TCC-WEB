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
    private $idPrateleira;

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

    public function getIdPrateleira()
    {
        return $this->idPrateleira;
    }

    public function setIdPrateleira($idPrateleira)
    {
        $this->idPrateleira = $idPrateleira;

        return $this;
    }

}