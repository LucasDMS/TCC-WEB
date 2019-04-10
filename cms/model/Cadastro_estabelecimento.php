<?php

    class Cadastro_estabelecimento{

        private $id;
        private $usuario;
        private $senha;
        private $cnpj;
        private $nome;
        private $tipo_estabelecimento;
        private $renda;
        private $descricao;
        private $endereco;
        private $bairro;
        private $cidade;
        private $estado;



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
    }
?>