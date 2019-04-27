<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 27/04/2019

*/
class Nutricional{
    private $id;
    private $valorCalorico;
    private $carboidratos;
    private $proteina;
    private $gordurasTotais;
    private $gordurasSaturadas;
    private $gordurasTrans;
    private $fibrasAlimentar;
    private $sodio;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getValorCalorico()
    {
        return $this->valorCalorico;
    }

    public function setValorCalorico($valorCalorico)
    {
        $this->valorCalorico = $valorCalorico;

        return $this;
    }

    public function getCarboidratos()
    {
        return $this->carboidratos;
    }

    public function setCarboidratos($carboidratos)
    {
        $this->carboidratos = $carboidratos;

        return $this;
    }

    public function getProteina()
    {
        return $this->proteina;
    }

    
    public function setProteina($proteina)
    {
        $this->proteina = $proteina;

        return $this;
    }

 
    public function getGordurasTotais()
    {
        return $this->gordurasTotais;
    }

    public function setGordurasTotais($gordurasTotais)
    {
        $this->gordurasTotais = $gordurasTotais;

        return $this;
    }
 
    public function getGordurasSaturadas()
    {
        return $this->gordurasSaturadas;
    }

    public function setGordurasSaturadas($gordurasSaturadas)
    {
        $this->gordurasSaturadas = $gordurasSaturadas;

        return $this;
    }

    public function getGordurasTrans()
    {
        return $this->gordurasTrans;
    }

    public function setGordurasTrans($gordurasTrans)
    {
        $this->gordurasTrans = $gordurasTrans;

        return $this;
    }

    public function getFibrasAlimentar()
    {
        return $this->fibrasAlimentar;
    }

    public function setFibrasAlimentar($fibrasAlimentar)
    {
        $this->fibrasAlimentar = $fibrasAlimentar;

        return $this;
    }

    public function getSodio()
    {
        return $this->sodio;
    }

    public function setSodio($sodio)
    {
        $this->sodio = $sodio;

        return $this;
    }
}

?>