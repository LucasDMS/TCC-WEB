<?php
/*
    Projeto: Exercicio de MVC em tela de Contatos
    Autor: Lucas
    Data Criação: 10/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de funcionario
*/
class Funcionario{
    private $id;
    private $nome;
    private $cargo;
    private $setor;
    private $dataEmissao;
    private $ativo;
    private $idAutenticacao;


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
    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getSetor()
    {
        return $this->setor;
    }

    public function setSetor($setor)
    {
        $this->setor = $setor;

        return $this;
    }

    public function getDataEmissao()
    {
        return $this->dataEmissao;
    }


    public function setDataEmissao($dataEmissao)
    {
        $this->dataEmissao = $dataEmissao;

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

    public function getIdAutenticacao()
    {
        return $this->idAutenticacao;
    }

    public function setIdAutenticacao($idAutenticacao)
    {
        $this->idAutenticacao = $idAutenticacao;

        return $this;
    }


    
}
?>