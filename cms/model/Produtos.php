<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 30/03/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de contatos
*/
class Produtos{
    private $id;
    private $nome;
    private $descricao;
    private $tamanho;
    private $modoPreparo;
    private $tempoProducao;
    private $ipi;
    private $idNutricional;
    private $ativo;
    private $apagado;


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

    public function getTamanho()
    {
        return $this->tamanho;
    }

 
    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;

        return $this;
    }

    public function getModoPreparo()
    {
        return $this->modoPreparo;
    }

    public function setModoPreparo($modoPreparo)
    {
        $this->modoPreparo = $modoPreparo;

        return $this;
    }



    public function getTempoProducao()
    {
        return $this->tempoProducao;
    }

    public function setTempoProducao($tempoProducao)
    {
        $this->tempoProducao = $tempoProducao;

        return $this;
    }

  
    public function getIpi()
    {
        return $this->ipi;
    }

    public function setIpi($ipi)
    {
        $this->ipi = $ipi;

        return $this;
    }
 
    public function getIdNutricional()
    {
        return $this->idNutricional;
    }

    public function setIdNutricional($idNutricional)
    {
        $this->idNutricional = $idNutricional;

        return $this;
    }


    public function getAtivo()
    {
        return $this->ativo;
    }


    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

 
    public function getApagado()
    {
        return $this->apagado;
    }

  
    public function setApagado($apagado)
    {
        $this->apagado = $apagado;

        return $this;
    }
}
?>