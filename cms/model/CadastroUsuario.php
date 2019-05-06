<?php
/* 
    Projeto: TCC
    Autor: Nicolas
    Data Criação: 11/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: class que guarda os dados que serão manipulados.
*/
class CadastroUsuario{
    private $id;
    private $login;
    private $senha;
    private $cpf;
    private $nome;
    private $endereco;
    private $sexo;
    private $bairro;
    private $cidade;
    private $estado;
    private $email;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }
 
    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
        return $this;
    }
 
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
 
    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
        return $this;
    }

    public function getSexo(){
        return $this->sexo;
    }
 
    public function setSexo($sexo){
        $this->sexo = $sexo;
        return $this;
    }

    public function getBairro(){
        return $this->bairro;
    }
 
    public function setBairro($bairro){
        $this->bairro = $bairro;
        return $this;
    }
 
    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
        return $this;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
        return $this;
    }
 
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
 

}




?>