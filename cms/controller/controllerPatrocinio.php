<?php 
class ControllerPatrocinio{
    
    private $PatrocinioDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/model/Patrocinio.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" .'/dao/PatrocinioDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" .'/view/components/imagem.php');
        $this->PatrocinioDAO = new PatrocinioDAO();
    }
    public function inserirPatrocinio(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $imagem = img($_FILES['img']);
            echo $imagem;
            $status = 1;
            $apagado = 0;
            $Patrocinio = new Patrocinio(); 
            $Patrocinio->setNome($nome);
            $Patrocinio->setDescricao($descricao);
            $Patrocinio->setImagem($imagem);
            $Patrocinio->setApagado($apagado);
            $Patrocinio->setStatus($status);
            return $this->PatrocinioDAO->insert($Patrocinio);
        }
    }
    public function atualizarPatrocinio(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id']; 
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $imagem = img($_FILES['img']);
            $Patrocinio = new Patrocinio(); 
            $Patrocinio->setId($id);
            $Patrocinio->setNome($nome);
            $Patrocinio->setDescricao($descricao);
            $Patrocinio->setImagem($imagem);
            $this->PatrocinioDAO->update($Patrocinio);
        }
    }
    public function excluirPatrocinio(){
        $id = $_POST['id'];
        $this->PatrocinioDAO ->delete($id);
    }
    public function ativarPatrocinio() {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Pratrocinio = new Patrocinio(); 
            $Pratrocinio->setId($id);
            $Pratrocinio->setStatus($ativo);
            
            $this->PatrocinioDAO->updateAtivo($Pratrocinio);
        }
    }
    
    public function buscarPatrocinioPorId(){
        $id = $_GET['id'];
        return $this->PatrocinioDAO->selectById($id);
    }
    public function buscarPatrocinio(){
        return $this->PatrocinioDAO->selectAll();
    }
}
?>