<?php
/*
    Projeto: TCC
    Autor: Lucas
    Data Criação: 10/04/2019
*/
class MenuFuncionario{
    private $id;
    private $paginas;
    private $status;
    private $data;
    private $idMenu;
    private $idFuncionario;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;

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


    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;

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