<?php
/*
    Projeto: TCC
    Autor: Rafael
    Data Criação: 25/04/2019
*/
    class Post{

        private $id;
        private $autor;
        private $autorFoto;
        private $texto;
        private $dtPublicacao;
        private $aprovado;
        private $ativo;
        private $likes;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getAutor(){
            return $this->autor;
        }

        public function setAutor($autor){
            $this->autor = $autor;
        }

        public function getAutorFoto(){
            return $this->autorFoto;
        }

        public function setAutorFoto($autorFoto){
            $this->autorFoto = $autorFoto;
        }

        public function getTexto(){
            return $this->texto;
        }

        public function setTexto($texto){
            $this->texto = $texto;
        }

        public function getDtPublicacao(){
            return $this->dtPublicacao;
        }

        public function setDtPublicacao($dtPublicacao){
            $this->dtPublicacao = $dtPublicacao;
        }

        public function getAprovado(){
            return $this->aprovado;
        }

        public function setAprovado($aprovado){
            $this->aprovado = $aprovado;
        }

        public function getAtivo(){
            return $this->ativo;
        }

        public function setAtivo($ativo){
            $this->ativo = $ativo;
        }

        public function getLikes(){
            return $this->likes;
        }

        public function setLikes($likes){
            $this->likes = $likes;
        }
    }
?>
