<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerMenu.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerFuncionario.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/cms" . "/controller/controllerSessao.php");

$nome = null;
$login = null;
$senha = null;
$tipo = null;
$cargo = null;
$setor = null;
$dataEmissao = null;
$checked = null;
$Pagina = array();
$ControllerMenu = new ControllerMenu();
$Controller = new ControllerFuncionario();
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

$modo == "atualizar" ? $paginaTitulo = "Atualizar dados do funcionário" : $paginaTitulo = "Novo funcionário";

?>

<form   onsubmit="asyncSubmit(event, this)"
        action="<?php echo $action;?>"
        method="post"
        autocomplete="off"
        id="frm_funcionario"
        enctype='multipart/form-data' 
        name="frm_funcionario"
        class="form_padrao"
        data-id="<?php echo $id ?>"
        data-idAutenticacao="<?php echo $idAutenticacao; ?>"
        data-modo="<?php echo $modo; ?>"
        data-pagina="funcionario">
       
    <div class="inputDados">
        <label from="txtNome">Nome</label>
        <input type="text" name="txtNome" id="txtNome" value="<?php echo $nome ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtLogin">Login</label>
        <input type="text" name="txtLogin" id="txtLogin" value="<?php echo $login ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtPassword">Senha</label>
        <input type="password" name="txtPassword" id="txtPassword" value="<?php echo $senha ?>" required>
    </div>

    <div class="inputDados">
        <select name="selectTipo" id="selectTipo">
            <?php 
                $selected1="";
                $selected2="";
                
                if($tipo=="ROOT"){
                    $selected1="selected";
                }elseif($tipo=="ADM"){
                    $selected2="selected";
                }
            ?>
                <option <?php echo $selected1;?> value="ROOT">ROOT (Acesso a funcionarios e páginas)</option>

                <option <?php echo $selected2;?> value="ADM">ADM (Acesso as páginas)</option>
          
        </select>
    </div>

    <div class="inputDados">
        <label from="txtCargo">Cargo</label>
        <input type="text" name="txtCargo" id="txtCargo" value="<?php echo $cargo ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtSetor">Setor</label>
        <input type="text" name="txtSetor" id="txtSetor" value="<?php echo $setor ?>" required>
    </div>

    <div class="inputDados">
        <label from="txtDtEmissao">Data de emissão</label>
        <input type="date" name="txtDtEmissao" id="txtDtEmissao" value="<?php echo $dataEmissao ?>" required>
    </div>

    <div class="container">
    
        <?php  
        
        foreach ($Paginas as $result){ 
            $checked = "";
        
                foreach ($Pagina as $result1){
                    if($result->getId() == $result1->getIdMenu()){
                        $checked = 'checked';
                    }
                }
            ?>

            <input  type="checkbox" <?php echo $checked ?> 
                    value="<?php echo $result->getId() ?>" 
                    name="checkbox[]"
                    id="<?php echo $result->getId() ?>"
            />

            <label  for="<?php echo $result->getId() ?>">
                <?php echo $result->getPaginas() ?>
            </label>
            
        <?php } ?>

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