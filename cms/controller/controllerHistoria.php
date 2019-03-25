
<?php 
class controllerHistoria{
    
    private $historiaDAO;
    public function __construct(){
        require_once("model/historiaClass.php");
        //import da classe historiaDAO, para inserir no BD
        require_once('model/DAO/historiaDAO.php');
        $this->historiaDAO = new historiaDAO();
    }
    public function inserirHistoria(){
        //verica qual metodo está sendo requisitado no formulario (POST ou GET) :)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $imagem = $_POST['imgHistoria'];
            $texto = $_POST['txtTexto'];
            $historiaClass = new Historia(); 
            //Guardando os dados do post no objeto da classe historia
            $historiaClass -> setImagem($imagem);
            $historiaClass -> setTexto($texto);
            //Chamada para o metodo de inserir no BD, e estamos passando como parametro o objeto $historiaClass que tem todos os dados que serão inseridos no BD
            $this->historiaDAO->insert($historiaClass);
        }
    }
    public function atualizarHistoria(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id= $_GET['id'];
            $imagem = $_POST['imgHistoria'];
            $texto = $_POST['txtTexto'];
            
            $historiaClass = new Historia(); 
            //Guardando os dados do post no objeto da classe historia
            $historiaClass ->setId($id);
            $historiaClass -> setImagem($imagem);
            $historiaClass-> setTexto($texto);
            
            $this->historiaDAO->update($historiaClass);
        }
    }
    public function excluirHistoria(){
        $id = $_GET['id'];
        $this->historiaDAO ->delete($id);
    }
    
    
    public function buscarHistoria(){
        $id = $_GET['id'];
        return $this->historiaDAO->selectById($id);
    }
}
?>