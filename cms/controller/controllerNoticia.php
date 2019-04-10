<?php 
class ControllerNoticia{
    
    private $NoticiaDAO;
    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/model/Noticia.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" .'/dao/NoticiaDAO.php');
        $this->NoticiaDAO = new NoticiaDAO();
    }
    public function inserirNoticia(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $titulo =$_POST['txt_titulo'];
            $texto  = $_POST['txt_conteudo'];
            $ativo = 1;
            $ordem  = 1;
            $apagado = 0;
            
            $Noticia = new Noticia(); 
            $Noticia->setTitulo($titulo);
            $Noticia->setConteudo($texto);
            $Noticia->setApagado($apagado);
            $Noticia->setOrdem($ordem);
            $Noticia->setAtivo($ativo);
            $this->NoticiaDAO->insert($Noticia);
        }
    }
    public function atualizarNoticia(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id = $_POST['id'];
            $titulo  = $_POST['txt_titulo']; 
            $conteudo  = $_POST['txt_conteudo'];            
            $Noticia = new Noticia(); 

            $Noticia->setId($id);
            $Noticia->setTitulo($titulo);
            $Noticia->setConteudo($conteudo);
            
            $this->NoticiaDAO->update($Noticia);
        }
    }
    public function excluirNoticia(){
        $id = $_POST['id'];
        $this->NoticiaDAO ->delete($id);
    }
    public function ativarNoticia() {

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $Noticia = new Noticia(); 

            $Noticia->setId($id);
            $Noticia->setAtivo($ativo);
            
            $this->NoticiaDAO->updateAtivo($Noticia);
        }
    }
    
    public function buscarNoticiaPorId(){
        $id = $_GET['id'];
        return $this->NoticiaDAO->selectById($id);
    }
    public function buscarNoticias(){
        return $this->NoticiaDAO->selectAll();
    }
}
?>