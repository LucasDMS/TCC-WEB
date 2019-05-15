<?php
    class Brinde{
        
        private $id;
        private $nome;
        private $descricao;
        private $imagem;
        private $preco;
        private $usuario;
        
        public function getNome(){
            return $this->nome;
        }
 
        public function setNome($nome){
            $this->nome = $nome;
            return $this;
        }
        public function getDescricao(){
            return $this->descricao;
        }
 
        public function setDescricao($descricao){
            $this->descricao = $descricao;
            return $this;
        }
        public function getImagem(){
            return $this->imagem;
        }
        public function setImagem($imagem){
            $this->imagem = $imagem;
            return $this;
        }
        public function getPreco(){
            return $this->preco;
        }
        public function setPreco($preco){
            $this->preco = $preco;
            return $this;
        }
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
    }