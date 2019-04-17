<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 06/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de pops na escola
    */
    class PopsEscola{
        private $id;
        private $nome;
        private $descricao;
        private $imagem;
        private $status;
        private $apagado;


        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

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

        public function getStatus(){
            return $this->status;
        }
 
        public function setStatus($status){
            $this->status = $status;
            return $this;
        }

        public function getApagado(){
            return $this->apagado;
        }

        public function setApagado($apagado){
            $this->apagado = $apagado;
            return $this;
        }

    }

?>