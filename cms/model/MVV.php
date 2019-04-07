<?php
class MVV{
    private $id;
    private $texto;
    private $paragrafo;
    private $ativo;
    private $apagado;
    

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getTexto(){
        return $this->texto;
    }

    public function setTexto($texto){
        $this->texto = $texto;
    }

    public function getParagrafo()
    {
        return $this->paragrafo;
    }
    public function setParagrafo($paragrafo)
    {
        $this->paragrafo = $paragrafo;

        return $this;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }


    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    public function getApagado()
    {
        return $this->apagado;
    }
    public function setApagado($apagado)
    {
        $this->apagado = $apagado;

        return $this;
    }
}
?>