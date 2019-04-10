<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de contatos
    */

    class Videos{
        private $id;
        private $titulo;
        private $link;
        private $status;
        private $apagado;
        private $descricao;


        //get e set da class videos
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id=$id;
        }
        
        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo=$titulo;
        }

        public function getLink(){
            return $this->link;
        }

        public function setLink($link){
            $this->link=$link;
        }

        public function getStatus(){
            return $this->status;
        }

        public function setStatus($status){
            $this->status=$status;
        }

        public function getApagado(){
            return $this->apagado;
        }

        public function setApagado($apagado){
            $this->apagado=$apagado;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
            return $this;
        }
    }

?>