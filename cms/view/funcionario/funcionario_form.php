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
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerFuncionario.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerSessao.php");
    $Controller = new ControllerFuncionario();
    $ControllerSessao = new ControllerSessao();
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
    $id = $Funcionario->getId();

}

?>

<form   onsubmit="asyncSubmit(event, this)" 
        action="<?php echo $action; ?>" 
        method="post" 
        autocomplete="off" 
        id="frm_funcionario" 
        data-id="<?php echo $id ?>"
        enctype='multipart/form-data' 
        name="frm_funcionario"
        data-pagina="funcionario"
        data-modo="<?php echo $modo?>"
        class="form_padrao">

        <input type="text" name="txtNome" id="txt_hora" placeholder="Nome" value="<?php echo $nome;?>"><br>
        <input type="text" name="txtLogin" id="txtLogin" placeholder="Login" value="<?php echo $login;?>"><br>
        <input type="text" name="txtPassword" id="txtPassword" placeholder="Senha" value="<?php echo $senha;?>"><br>
        <input type="text" name="txtTipo" id="txtTipo" placeholder="Tipo" value="<?php echo $tipo;?>"><br>
        <input type="text" name="txtCargo" id="txtCargo" placeholder="Cargo" value="<?php echo $cargo;?>"><br>
        <input type="text" name="txtSetor" id="txtSetor" placeholder="Setor" value="<?php echo $setor;?>"><br>
        <input type="date" name="txtDtEmissao" id="txtDtEmissao" placeholder="Data" value="<?php echo $dataEmissao;?>"><br>


    <button class="btn">
        Enviar
    </button>
</form>