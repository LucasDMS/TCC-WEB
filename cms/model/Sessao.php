<?php 
/*
    Projeto: TCC
    Autor: Rafael
    Data Criação: 30/03/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da classe: Autenticacao
*/
class Sessao{
    private $id;
    private $login;
    private $senha;
    private $tipo;
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }
    
   
}
?>