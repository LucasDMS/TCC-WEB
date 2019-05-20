<?php 
class ControllerSustentabilidade{
    
    private $SustentabilidadeDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/model/Sustentabilidade.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" .'/dao/SustentabilidadeDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" .'/view/components/imagem.php');
        $this->SustentabilidadeDAO = new SustentabilidadeDAO();
    }
    public function inserirSustentabilidade(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){

            // echo "teste";
            $texto =$_POST['txtTexto'];
            $imagem = img($_FILES['img']);
            $ativo = 1;
            $apagado = 0;
            $Sustentabilidade = new Sustentabilidade(); 
            $Sustentabilidade->setTexto($texto);
            $Sustentabilidade->setImagem($imagem);
            $Sustentabilidade->setApagado($apagado);
            $Sustentabilidade->setAtivo($ativo);
            return $this->SustentabilidadeDAO->insert($Sustentabilidade);

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
    
    public function buscarSustentabilidadePorId(){
        $id = $_GET['id'];
        return $this->SustentabilidadeDAO->selectById($id);
    }
    public function buscarSustentabilidades(){
        return $this->SustentabilidadeDAO->selectAll();
    }
}
?>