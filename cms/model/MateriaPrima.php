
<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 01/05/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de materia prima
    */

class MateriaPrima{

    private $id;
    private $nome;
    private $descricao;
    private $tipoMateria;
    private $quantidade;
    private $dataValidade;


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

    public function getQuantidade(){
        return $this->quantidade;
    }
 
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getTipoMateria(){
        return $this->tipoMateria;
    }

    public function setTipoMateria($tipoMateria){
        $this->tipoMateria = $tipoMateria;
        if(strpos($tipoMateria,"/")){
            $this->tipoMateria = date('Y-m-d', strtotime($tipoMateria));
        }else if(strpos($tipoMateria,"-")){
            //$this->data = date('Y/m/d', strtotime($data));
        }
    }

    public function getDataValidade(){
        return $this->dataValidade;
    }

    public function setDataValidade($dataValidade){
        $this->dataValidade = $dataValidade;
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

