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
class MenuUsuarioEstabelecimento{
    private $id;
    private $paginas;
    private $idMenu;
    private $idUsuario;

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

    public function getIdMenu()
    {
        return $this->idMenu;
    }


    public function setIdMenu($idMenu)
    {
        $this->idMenu = $idMenu;

        return $this;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }
}
?>