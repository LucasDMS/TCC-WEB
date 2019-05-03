<?php
    /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 27/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: controller de setores
    */

class ControllerSetores{
    private $SetoresDAO;

    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Setores.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/SetoresDAO.php");
        $this->SetoresDAO = new SetoresDAO();

    }

    //listar setores
    public function listarAll(){
        return $this->SetoresDAO->selectAll();
    }

    //listra prateleiras
    public function listarSetores(){
        return $this->SetoresDAO->selectSetores();
    }

    //apagar setores
    public function excluirSetores(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];

            $this->SetoresDAO->delete($id);
        }
    }

    //pegar os valor de setor para enviar para dão
    public function inserirSetores(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $rua = $_POST['txt_rua'];
            $capacidade = $_POST['txt_capacidade'];
            $prateleira = $_POST['txt_prateleira'];

            var_dump($prateleira);
            $Setores = new Setores();
            $Setores->setRua($rua);
            $Setores->setCapacidade($capacidade);
            $Setores->setPrateleira($prateleira);
            $this->SetoresDAO->inserirSetores($Setores);
        }

    }

    //buscar um setor especifico
    public function buscarSetoresPorId(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            return $this->SetoresDAO->selectById($id);
        }
    }

    //buscar um setor especifico
    public function buscarSetoresPorPrateleira(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_GET['id'];
            return $this->SetoresDAO->selectByIdPrateleira($id);
        }
    }

    public function atualizarSetores(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $rua = $_POST['txt_rua'];
            $capacidade = $_POST['txt_capacidade'];
            $prateleira = $_POST['txt_prateleira'];

            $Setores = new Setores();
            $Setores->setId($id);
            $Setores->setRua($rua);
            $Setores->setCapacidade($capacidade);
            $Setores->setPrateleira($prateleira);
            $this->SetoresDAO->update($Setores);
        }
    }

}

?>