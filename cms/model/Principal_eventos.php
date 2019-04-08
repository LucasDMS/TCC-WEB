<?php 
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: class de eventos;
    */
    class Principal_eventos{

        private $texto;
        private $status;
        private $apagado;
        private $tipo_texto;
        private $id;


        public function getTexto(){
            return $this->texto;
        }

        public function setTexto($texto){
            $this->texto = $texto;
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

        public function getTipo_texto(){
            return $this->tipo_texto;
        }

        public function setTipo_texto($tipo_texto){
            $this->tipo_texto = $tipo_texto;
            return $this;
        }


        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }
    }


?>