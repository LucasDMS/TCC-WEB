<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerMenuUsuarioEstabelecimento.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerUsuarioEstabelecimento.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerSessao.php");

    $nome = null;
    $login = null;
    $senha = null;
    $tipo = null;
    $checked = null;
    $Pagina = array();
    $ControllerMenu = new ControllerMenuUsuarioEstabelecimento();
    $Controller = new ControllerUsuarioEstabelecimento();
    $ControllerSessao = new ControllerSessao();

       
    $action = "router.php?controller=usuario_estabelecimento&modo=inserir";
    $modo = "inserir";
    $id = "";
    $idAutenticacao = "";

    $Paginas = $ControllerMenu->buscarMenu();
    if(isset($_GET['id']) && $_GET['idAutenticacao']){
        $id = $_GET['id'];
        $idAutenticacao = $_GET['idAutenticacao'];
        
        $ControllerMenu = new ControllerMenuUsuarioEstabelecimento();
        $Controller = new ControllerUsuarioEstabelecimento();
        $ControllerSessao = new ControllerSessao();
        $Pagina = $ControllerMenu->buscarMenuPorId($id);
        $Sessao = $ControllerSessao->buscarUsuarioPorId($id);
        $Usuario = $Controller->buscarUsuarioEstabelecimentoPorId($id);

        $action = "router.php?controller=usuario_estabelecimento&modo=atualizar";
        $modo = "atualizar";
        $nome = $Usuario->getNome();
        $login = $Sessao->getLogin();
        $senha = $Sessao->getSenha();
        $tipo = $Sessao->getTipo();
        
    }
?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action;?>"
        method="post"
        autocomplete="off"
        id="frm_usuario_estabelecimento"
        enctype='multipart/form-data' 
        name="frm_usuario_estabelecimento"
        class="form_padrao"
        data-id="<?php echo $id; ?>"
        data-idAutenticacao="<?php echo $idAutenticacao; ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="usuario_estabelecimento">

        <div class="inputDados">
            <input type="text" name="txtNome" id="txtNome" placeholder="Nome" value="<?php echo $nome;?>"><br>
        </div>
        <div class="inputDados">
            <input type="text" name="txtLogin" id="txtLogin" placeholder="Login" value="<?php echo $login;?>"><br>
        </div>
        <div class="inputDados">
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Senha" value="<?php echo $senha;?>"><br>
        </div>
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
    <div class="flex flex-center">
        <button type="reset" class="btn btn-clear">
            <i class="fas fa-eraser"></i>
        </button>

        <button class="btn btn-submit">
            <i class="fas fa-save"></i>
        </button>
    </div>

</form>