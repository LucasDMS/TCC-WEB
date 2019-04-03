<?php 
class ControllerSustentabilidade{
    
    private $SustentabilidadeDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Sustentabilidade.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/SustentabilidadeDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/view/components/imagem.php');
        $this->SustentabilidadeDAO = new SustentabilidadeDAO();
    }
    public function inserirSustentabilidade(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $texto =$_POST['txtTexto'];
            $imagem = img($_FILES['img']);
            $ativo = 1;
            $ordem  = 1;
            $apagado = 0;
            
            $Sustentabilidade = new Sustentabilidade(); 
            $Sustentabilidade->setTexto($texto);
            $Sustentabilidade->setImagem($imagem);
            $Sustentabilidade->setApagado($apagado);
            $Sustentabilidade->setAtivo($ativo);
            $this->SustentabilidadeDAO->insert($Sustentabilidade);
        }
    }
    public function atualizarSustentabilidade(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $texto =$_POST['txtTitulo'];
            $ativo = 1;
            $ordem  = 1;
            $apagado = 0;
            
            $Sustentabilidade = new Sustentabilidade(); 
            $Sustentabilidade->setTexto($titulo);
            $Sustentabilidade->setIdImagem($texto);
            $Sustentabilidade->setApagado($apagado);
            $Sustentabilidade->setAtivo($ativo);
            
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
    
    public function buscarSustentabilidadePorId(){
        $id = $_GET['id'];
        return $this->SustentabilidadeDAO->selectById($id);
    }
    public function buscarSustentabilidades(){
        return $this->SustentabilidadeDAO->selectAll();
    }
}
?>