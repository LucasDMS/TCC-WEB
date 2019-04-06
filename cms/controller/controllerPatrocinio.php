<?php 
class ControllerPatrocinio{
    
    private $PatrocinioDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Patrocinio.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/PatrocinioDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/view/components/imagem.php');
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
    public function atualizarSustentabilidade(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id     = $_POST['id']; 
            $texto =$_POST['txtTexto'];
            $imagem = img($_FILES['img']);
            $ativo = 1;
            $apagado = 0;
            $Sustentabilidade = new Sustentabilidade(); 
            $Sustentabilidade->setId($id);
            $Sustentabilidade->setTexto($texto);
            $Sustentabilidade->setImagem($imagem);
            $this->SustentabilidadeDAO->update($Sustentabilidade);
        }
    }
    public function excluirSustentabilidade(){
        $id = $_POST['id'];
        $this->SustentabilidadeDAO ->delete($id);
    }
    public function ativarSustentabilidade() {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Sustentabilidade = new Sustentabilidade(); 
            $Sustentabilidade->setId($id);
            $Sustentabilidade->setAtivo($ativo);
            
            $this->SustentabilidadeDAO->updateAtivo($Sustentabilidade);
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