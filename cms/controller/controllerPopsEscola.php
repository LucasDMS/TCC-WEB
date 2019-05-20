<?php
class ControllerPopsEscola{
    private $PopsEscolaDAO;

    public function __construct(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/model/PopsEscola.php");
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" .'/dao/PopsEscolaDAO.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" .'/view/components/imagem.php');
        $this->PopsEscolaDAO = new PopsEscolaDAO();
    }

    public function inserirPopsEscola(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $imagem = img($_FILES['img']);
            echo $imagem;
            $status = 1;
            $apagado = 0;
            $PopsEscola = new PopsEscola(); 
            $PopsEscola->setNome($nome);
            $PopsEscola->setDescricao($descricao);
            $PopsEscola->setImagem($imagem);
            $PopsEscola->setApagado($apagado);
            $PopsEscola->setStatus($status);
            return $this->PopsEscolaDAO->insert($PopsEscola);
        }
    }
    public function atualizarPopsEscola(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id = $_POST['id']; 
            $nome = $_POST['txt_nome'];
            $descricao = $_POST['txt_descricao'];
            $imagem = img($_FILES['img']);
            $PopsEscola = new PopsEscola(); 
            $PopsEscola->setId($id);
            $PopsEscola->setNome($nome);
            $PopsEscola->setDescricao($descricao);
            $PopsEscola->setImagem($imagem);
            $this->PopsEscolaDAO->update($PopsEscola);
        }
    }
    public function excluirPopsEscola(){
        $id = $_POST['id'];
        $this->PopsEscolaDAO ->delete($id);
    }
    public function ativarPopsEscola() {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id     = $_POST['id'];
            $ativo  = $_POST['ativo'];
            
            $PopsEscola = new PopsEscola(); 
            $PopsEscola->setId($id);
            $PopsEscola->setStatus($ativo);
            
            $this->PopsEscolaDAO->updateAtivo($PopsEscola);
        }
    }
    
    public function buscarPopsEscolaPorId(){
        $id = $_GET['id'];
        return $this->PopsEscolaDAO->selectById($id);
    }
    public function buscarPopsEscola(){
        return $this->PopsEscolaDAO->selectAll();
    }

}


?>