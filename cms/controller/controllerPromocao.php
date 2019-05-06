<?php 
class ControllerPromocao{
    
    private $PromocaoDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Promocao.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/PromocaoDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/view/components/imagem.php');
        $this->PromocaoDAO = new PromocaoDAO();
    }
    public function inserirPromocao(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){

            // echo "teste";
            $nome =$_POST['txtNome'];
            $dataInicio = $_POST['txtDataInicio'];
            $dataFinal = $_POST['txtDataFinal'];
            $texto = $_POST['txtTexto'];
            $imagem = img($_FILES['img']);
            $ativo = 1;
            $apagado = 0;
            $Promocao = new Promocao(); 
            $Promocao->setNome($nome);
            $Promocao->setDataInicio($dataInicio);
            $Promocao->setDataFinal($dataFinal);
            $Promocao->setTexto($texto);
            $Promocao->setImagem($imagem);
            $Promocao->setAtivo($ativo);
            $Promocao->setApagado($apagado);
            return $this->PromocaoDAO->insert($Promocao);

        }
    }
    public function atualizarPromocao(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id     = $_POST['id']; 
            $nome =$_POST['txtNome'];
            $dataInicio = $_POST['txtDataInicio'];
            $dataFinal = $_POST['txtDataFinal'];
            $texto = $_POST['txtTexto'];
            $imagem = img($_FILES['img']);
            $ativo = 1;
            $apagado = 0;
            $Promocao = new Promocao(); 
            $Promocao->setId($id);
            $Promocao->setNome($nome);
            $Promocao->setDataInicio($dataInicio);
            $Promocao->setDataFinal($dataFinal);
            $Promocao->setTexto($texto);
            $Promocao->setImagem($imagem);
            $Promocao->setAtivo($ativo);
            $Promocao->setApagado($apagado);
            $this->PromocaoDAO->update($Promocao);
        }
    }
    public function excluirPromocao(){
        $id = $_POST['id'];
        $this->PromocaoDAO ->delete($id);
    }
    public function ativarPromocao() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Promocao = new Promocao(); 

            $Promocao->setId($id);
            $Promocao->setAtivo($ativo);
            
            $this->PromocaoDAO->updateAtivo($Promocao);
        }
    }
    
    public function buscarPromocaoPorId(){
        $id = $_GET['id'];
        return $this->PromocaoDAO->selectById($id);
    }
    public function buscarPromocoes(){
        return $this->PromocaoDAO->selectAll();
    }

    public function participar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            // echo "teste";
            $idPromocao =$_POST['idPromocao'];
            $idUsuario = $_POST['id'];
            $Promocao = new Promocao(); 
            $Promocao->setId($idPromocao);
            $Promocao->setIdUsuario($idUsuario);
            return $this->PromocaoDAO->participe($Promocao);

        }
    }
}
?>