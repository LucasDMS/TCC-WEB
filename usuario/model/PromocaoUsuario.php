<?php
/*
        Projeto: TCC
        Autor: 
        Data Criação: 26/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class que guarda os dados que serão manipulados.
    */
    class PromocaoUsuario{

        private $id;
        private $id_usuario;
        private $id_promocao;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getIdUsuario(){
            return $this->id_usuario;
        }

        public function setIdUsuario($id_usuario){
            $this->id_usuario = $id_usuario;
            return $this;
        }

        public function getIdPromocao(){
            return $this->id_promocao;
        }

        public function setIdPromocao($id_promocao){
            $this->id_promocao = $id_promocao;
            return $this;
        }

    }
?>
