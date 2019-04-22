<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerMenuUsuarioEstabelecimento.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerUsuarioEstabelecimento.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerSessao.php");

    $nome = null;
    $login = null;
    $senha = null;
    $tipo = null;
    $cargo = null;
    $setor = null;
    $dataEmissao = null;
    $checked = null;
    $Pagina = array();
    $ControllerMenu = new ControllerMenuUsuarioEstabelecimento();
    $Controller = new ControllerUsuarioEstabelecimento();
    $ControllerSessao = new ControllerSessao();

       
    $action = "router.php?controller=funcionario&modo=inserir";
    $modo = "inserir";
    $id = "";
    $idAutenticacao = "";

    $Paginas = $ControllerMenu->buscarMenu();
    if(isset($_GET['id']) && $_GET['idAutenticacao']){
        $id = $_GET['id'];
        $idAutenticacao = $_GET['idAutenticacao'];
        
        $ControllerMenu = new ControllerMenu();
        $Controller = new ControllerFuncionario();
        $ControllerSessao = new ControllerSessao();
        $Pagina = $ControllerMenu->buscarMenuPorId($id);
        $Sessao = $ControllerSessao->buscarFuncionarioPorId($id);
        $Usuario = $Controller->buscarUsuarioEstabelecimentoPorId($id);

        $action = "router.php?controller=funcionario&modo=atualizar";
        $modo = "atualizar";

        $nome = $Funcionario->getNome();
        $setor= $Funcionario->getSetor();
        $cargo = $Funcionario->getCargo();
        $dataEmissao= $Funcionario->getDataEmissao();

        $login = $Sessao->getLogin();
        $senha = $Sessao->getSenha();
        $tipo = $Sessao->getTipo();

    }
?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action;?>"
        method="post"
        autocomplete="off"
        id="frm_funcionario"
        enctype='multipart/form-data' 
        name="frm_funcionario"
        class="form_padrao"
        data-texto="<?php echo $texto ?>"
        data-id="<?php echo $id ?>"
        data-idAutenticacao="<?php echo $idAutenticacao ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="funcionario">

       
        <input type="text" name="txtNome" id="txtNome" placeholder="Nome" value="<?php echo $nome;?>"><br>
        <input type="text" name="txtLogin" id="txtLogin" placeholder="Login" value="<?php echo $login;?>"><br>
        <input type="text" name="txtPassword" id="txtPassword" placeholder="Senha" value="<?php echo $senha;?>"><br>
        <div class="container" >
        
    <?php  
     
    foreach ($Paginas as $result){ 
        $checked = "";
    
            foreach ($Pagina as $result1){
                if($result->getId() == $result1->getIdMenu()){
                    $checked = 'checked';
                }
            }
       

        
        ?>
        <input type="checkbox" <?php echo $checked;?> 
            value="<?php echo $result->getId() ?>" 
            name="checkbox[]"
            id="<?php echo $result->getId() ?>"
        />

        <label for="<?php echo $result->getId() ?>">
            <?php echo $result->getPaginas() ?>
        </label>
        
    <?php 
        
     
    }
         
    
    ?>
        </div>
    <button class="btn">
        Enviar
    </button>
</form>