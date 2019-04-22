<?php
/*
    Projeto: Exercicio de MVC em tela de Contatos
    Autor: Lucas
    Data Criação: 22/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Classe de Menu
*/
class MenuUsuarioEsbelecimento{
    private $id;
    private $paginas;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
    }
    public function getPaginas()
    {
        return $this->paginas;
    }

    public function setPaginas($paginas)
    {
        $this->paginas = $paginas;
        return $this;
    }

 
}
?>