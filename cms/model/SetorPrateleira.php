<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 30/04/2019
    Objetivo da classe: Classe de Setor prateleira
*/
class SetorPrateleira{
    private $id;
    private $idSetor;
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
    public function getIdSetor()
    {
        return $this->idSetor;
    }

    public function setIdSetor($idSetor)
    {
        $this->idSetor = $idSetor;

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