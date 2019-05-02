<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 27/04/2019
    Objetivo da classe: Classe de Produto Materia prima
*/
class ProdutoMateriaPrima{
    private $id;
    private $idProduto;
    private $idMateriaPrima;

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

    public function getIdMateriaPrima()
    {
        return $this->idMateriaPrima;
    }

    public function setIdMateriaPrima($idMateriaPrima)
    {
        $this->idMateriaPrima = $idMateriaPrima;

        return $this;
    }
}