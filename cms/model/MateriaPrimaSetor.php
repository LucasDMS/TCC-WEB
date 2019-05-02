<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 02/05/2019
    Objetivo da classe: Classe de Setor Materia prima
*/
class MateriaPrimaSetor{
    private $id;
    private $idPrateleira;
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


    public function getIdMateriaPrima()
    {
        return $this->idMateriaPrima;
    }

    public function setIdMateriaPrima($idMateriaPrima)
    {
        $this->idMateriaPrima = $idMateriaPrima;

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