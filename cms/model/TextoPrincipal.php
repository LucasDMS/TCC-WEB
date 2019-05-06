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
class TextoPrincipal{
    private $id;

    private $texto;
    private $titulo;
    private $tipoTexto;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;

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

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
}

?>