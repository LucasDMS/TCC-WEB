<?php
class Cores{
    private $id;
    private $cores;
    private $tipoCores;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getCores(){
        return $this->cores;
    }

    public function setCores($cores){
      $this->cores = $cores;
    }

    public function getTipoCores()
    {
        return $this->tipoCores;
    }


    public function setTipoCores($tipoCores)
    {
        $this->tipoCores = $tipoCores;

        return $this;
    }  
}
?>