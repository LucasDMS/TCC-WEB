<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 09/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de texto principal das paginas
*/
class UsuarioEstabelecimento{
    private $id;
    private $nome;
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