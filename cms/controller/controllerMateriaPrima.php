
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
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/MateriaPrima.php"); 
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/Prateleira.php"); 
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/ProdutoMateriaPrima.php"); 
        require_once($_SERVER['DOCUMENT_ROOT']. "/cms". "/dao/MateriaPrimaDAO.php");
        $this->MateriaPrimaDAO = new MateriaPrimaDAO();
        
    }

    public function inserirMateriaPrima(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $validade = $_POST['txt_date'];
            $tipoMateria = $_POST['txt_tipo_materia'];
            $prateleira = $_POST['prateleira'];
            $MateriaPrima = new MateriaPrima();
            $MateriaPrima->setNome($nome);
            $MateriaPrima->setDescricao($descricao);
            $MateriaPrima->setDataValidade($validade);
            $MateriaPrima->setTipoMateria($tipoMateria);

            $Prateleira = new Prateleira();
            $Prateleira->setId($prateleira);
            $this->MateriaPrimaDAO->inserir($MateriaPrima, $Prateleira);
        }
    }

    public function atualizarMateriaPrima(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id'];
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $validade = $_POST['txt_date'];
            $tipoMateria = $_POST['txt_tipo_materia'];
            $prateleira = $_POST['prateleira'];
            $MateriaPrima = new MateriaPrima();
            $MateriaPrima->setId($id);
            $MateriaPrima->setNome($nome);
            $MateriaPrima->setDescricao($descricao);
            $MateriaPrima->setDataValidade($validade);
            $MateriaPrima->setTipoMateria($tipoMateria);
            $Prateleira = new Prateleira();
            $Prateleira->setId($prateleira);

            $this->MateriaPrimaDAO->update($MateriaPrima, $Prateleira);
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
            
    public function buscarProdutoMateriaPrimaPorId(){
        $id = $_GET['id'];
        return $this->MateriaPrimaDAO->selectByIdProduto($id);
    }

    public function listarMateriaPrima(){
        return $this->MateriaPrimaDAO->selectAll();
    }

    public function listarEmbalagem(){
        return $this->MateriaPrimaDAO->selectAllEmbalagem();
    }
}

?>