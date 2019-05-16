<?php

    class Carrinho{
        private $id;
        private $nome;
        private $imagem;
        private $quantidade;
        private $preco;
        private $descricao;

        public function getNome(){
            return $this->nome;
        }


        public function setNome($nome){
            $this->nome = $nome;
            return $this;
        }

        public function getImagem(){
            return $this->imagem;
        }

        public function setImagem($imagem){
            $this->imagem = $imagem;
            return $this;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
            return $this;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function setPreco($preco){
            $this->preco = $preco*12;
            return $this;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
            return $this;
        }
    }

?>