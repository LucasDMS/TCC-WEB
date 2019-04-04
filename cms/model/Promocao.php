<?php
Class Promocao{
    private $id;
    private $nome;
    private $imagem;
    private $dataInicio;
    private $dataFinal;
    private $tipoTexto;
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
    public function getImagem()
    {
        return $this->imagem;
    }


    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }


    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }


    public function getDataFinal()
    {
        return $this->dataFinal;
    }

    public function setDataFinal($dataFinal)
    {
        $this->dataFinal = $dataFinal;

        return $this;
    }
    public function getTipoTexto()
    {
        return $this->tipoTexto;
    }

    public function setTipoTexto($tipoTexto)
    {
        $this->tipoTexto = $tipoTexto;

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