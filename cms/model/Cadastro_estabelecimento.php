<?php
/*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 10/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que guarda os dados que serão manipulados.
    */
    class Cadastro_estabelecimento{

        private $id;
        private $usuario;
        private $tipo_usuario;
        private $senha;
        private $nome;
        private $cnpe;
        private $tipo_estabelecimento;
        private $renda;
        private $descricao;
        private $endereco;
        private $bairro;
        private $cidade;
        private $estado;
        private $email;
        private $id_autenticacao;
        private $id_usuario;
        private $razao_social;
        private $nome_fantasia;
        private $ativo;
        private $imagem;


        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
            return $this;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
            return $this;
        }

        public function getCnpj(){
            return $this->cnpj;
        }

        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
            return $this;
        }
 
        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
            return $this;
        }

        public function getTipo_estabelecimento(){
            return $this->tipo_estabelecimento;
        }

        public function setTipo_estabelecimento($tipo_estabelecimento){
            $this->tipo_estabelecimento = $tipo_estabelecimento;
            return $this;
        }

        public function getRenda(){
            return $this->renda;
        }

         
        public function setRenda($renda){
            $this->renda = $renda;
            return $this;
        }
 
        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
            return $this;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
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
 
        public function getTipo_usuario(){
            return $this->tipo_usuario;
        }

        public function setTipo_usuario($tipo_usuario){
            $this->tipo_usuario = $tipo_usuario;
            return $this;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
            return $this;
        }

        public function getId_usuario(){
            return $this->id_usuario;
        }

        public function setId_usuario($id_usuario){
            $this->id_usuario = $id_usuario;
            return $this;
        }
 
        public function getRazao_social(){
            return $this->razao_social;
        }

        public function setRazao_social($razao_social){
            $this->razao_social = $razao_social;
            return $this;
        }

        public function getNome_fantasia(){
            return $this->nome_fantasia;
        }

        public function setNome_fantasia($nome_fantasia){
            $this->nome_fantasia = $nome_fantasia;
            return $this;
        }

        public function getId_autenticacao(){
            return $this->id_autenticacao;
        }

        public function setId_autenticacao($id_autenticacao){
            $this->id_autenticacao = $id_autenticacao;
            return $this;
        }

        public function getImagem(){
            return $this->imagem;
        }

        public function setImagem($imagem){
            $this->imagem = $imagem;
            return $this;
        }

        public function getAtivo(){
            return $this->ativo;
        }

        public function setAtivo($ativo){
            $this->ativo = $ativo;
            return $this;
        }
    }
?>
