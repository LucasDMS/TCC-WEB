<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 27/04/2019
    Objetivo da classe: Classe de Produto
*/
class Produto{
    private $id;
    private $nome;
    private $descricao;
    private $tamanho;
    private $modoPreparo;
    private $tempoProducao;
    private $ipi;
    private $ativo;
    private $apagado;
    private $ordem;
    private $produtoDestaque;
    private $imagem;
    private $idNutricional;
    

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

    public function getOrdem()
    {
        return $this->ordem;
    }

    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;

        return $this;
    }

    public function getProdutoDestaque()
    {
        return $this->produtoDestaque;
    }

    public function setProdutoDestaque($produtoDestaque)
    {
        $this->produtoDestaque = $produtoDestaque;

        return $this;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

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
}
?>