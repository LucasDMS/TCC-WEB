<?php
Class FaleConosco{
    private $id;
    private $nome;
    private $email;
    private $celular;
    private $telefone;
    private $estado;
    private $cidade;
    private $texto;
    private $data;
    private $status;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    public function getCelular()
    {
        return $this->celular;
    }


    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

 
    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    
    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getTexto()
    {
        return $this->texto;
    }


    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


    
    public function getData()
    {
        return $this->data;
    }
    

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
?>