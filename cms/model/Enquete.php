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

class Enquete{

    private $id;
    private $pergunta;
    private $resposta;
    private $resposta2;
    private $data;
    private $apagado;
    private $status;
    private $votos;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
 
    public function getPergunta(){
        return $this->pergunta;
    }

    public function setPergunta($pergunta){
        $this->pergunta = $pergunta;
        return $this;
    }

    public function getResposta(){
        return $this->resposta;
    }

    public function setResposta($resposta){
        $this->resposta = $resposta;
        return $this;
    }

    function getApagado(){
        return $this->apagado;
    }

    public function setApagado($apagado){
        $this->apagado = $apagado;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data=$data;

        if(strpos($data,"/")){
            $this->data = date('Y-m-d', strtotime($data));
        }else if(strpos($data,"-")){
            //$this->data = date('Y/m/d', strtotime($data));
        }
    }
 
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    public function getVotos(){
        return $this->votos;
    }

    public function setVotos($votos){
        $this->votos = $votos;
        return $this;
    }

    public function getResposta2(){
        return $this->resposta2;
    }

    public function setResposta2($resposta2){
        $this->resposta2 = $resposta2;
        return $this;
    }
}

?>