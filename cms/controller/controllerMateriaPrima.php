<?php
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: controller de materia prima
    */
class ControllerMateriaPrima{
    private $MateriaPrimaDAO;    

    private $nome = null;
    private $descricao = null;
    private $validade = null;
    private $quantidade = null;
    private $status = null;


    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/MateriaPrima.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms". "/dao/MateriaPrimaDAO.php");
        $this->MateriaPrimaDAO = new MateriaPrimaDAO();
        
    }

    public function inserirMateriaPrima(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $validade = $_POST['txt_date'];
            $quantidade = $_POST['txt_quantidade'];
            $tipoMateria = $_POST['txt_tipo_materia'];

            $MateriaPrima = new MateriaPrima();
            $MateriaPrima->setNome($nome);
            $MateriaPrima->setDescricao($descricao);
            $MateriaPrima->setDataValidade($validade);
            $MateriaPrima->setQuantidade($quantidade);
            $MateriaPrima->setTipoMateria($tipoMateria);

            $this->MateriaPrimaDAO->inserir($MateriaPrima);
        }
    }

    public function atualizarMateriaPrima(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $validade = $_POST['txt_date'];
            $quantidade = $_POST['txt_quantidade'];
            $tipoMateria = $_POST['txt_tipo_materia'];

            $MateriaPrima = new MateriaPrima();
            $MateriaPrima->setId($id);
            $MateriaPrima->setNome($nome);
            $MateriaPrima->setDescricao($descricao);
            $MateriaPrima->setDataValidade($validade);
            $MateriaPrima->setQuantidade($quantidade);
            $MateriaPrima->setTipoMateria($tipoMateria);

            $this->MateriaPrimaDAO->update($MateriaPrima);
        }
    }

    public function excluirMateriaPrima(){
        $id = $_POST['id'];
        $this->MateriaPrimaDAO->delete($id);
    }

    public function buscarMateriaPrimaPorId(){
        $id = $_GET['id'];
        return $this->MateriaPrimaDAO->selectById($id);
    }

    public function listarMateriaPrima(){
        return $this->MateriaPrimaDAO->selectAll();
    }

}

?>