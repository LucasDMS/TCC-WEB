<?php 
$nome = null;
$login = null;
$senha = null;
$tipo = null;
$cargo = null;
$setor = null;
$dataEmissao = null;

$action = "router.php?controller=funcionario&modo=inserir";
$modo = "inserir";
$id = "";
$idAutenticacao = "";
if(isset($_GET['id']) && $_GET['idAutenticacao']){
    $id = $_GET['id'];
    $idAutenticacao = $_GET['idAutenticacao'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerFuncionario.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerSessao.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerMenu.php");

    $Controller = new ControllerFuncionario();
    $ControllerSessao = new ControllerSessao();
    $ControllerMenu = new ControllerMenu();
    $Paginas = $ControllerMenu->buscarMenu();
    $Sessao = $ControllerSessao->buscarFuncionarioPorId($id);
    $Funcionario = $Controller->buscarFuncionarioPorId($id);
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

<form  onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action; ?>"
        method="post"
        autocomplete="off"
        id="frm_funcionario"
        enctype='multipart/form-data' 
        name="frm_funcionario"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-idAutenticacao="<?php echo $idAutenticacao ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="funcionario">

        <input type="text" name="txtNome" id="txt_hora" placeholder="Nome" value="<?php echo $nome;?>"><br>
        <input type="text" name="txtLogin" id="txtLogin" placeholder="Login" value="<?php echo $login;?>"><br>
        <input type="text" name="txtPassword" id="txtPassword" placeholder="Senha" value="<?php echo $senha;?>"><br>
        <input type="text" name="txtTipo" id="txtTipo" placeholder="Tipo" value="<?php echo $tipo;?>"><br>
        <input type="text" name="txtCargo" id="txtCargo" placeholder="Cargo" value="<?php echo $cargo;?>"><br>
        <input type="text" name="txtSetor" id="txtSetor" placeholder="Setor" value="<?php echo $setor;?>"><br>
        <input type="date" name="txtDtEmissao" id="txtDtEmissao" placeholder="Data" value="<?php echo $dataEmissao;?>"><br>

        <div class="container" >
        
    <?php  
    
    
    foreach ($Paginas as $result){ ?>
        <input type="checkbox" value="<?php echo $result->getId() ?>" id="<?php echo $result->getId() ?>"> <label for="<?php echo $result->getId() ?>"><?php echo $result->getPaginas() ?></label>
        
    <?php } ?>
        </div>
    <button class="btn">
        Enviar
    </button>
</form>