<?php 
 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerUsuarioEstabelecimento.php");
    $controller = new ControllerUsuarioEstabelecimento();
    $rs = $controller->buscarUsuarioEstabelecimento();

?>

<div class="pagina_titulo">
    UsuarioEstabelecimentos
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('usuario_estabelecimento')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Nome : 
                <?php echo $result->getNome(); ?>
            </div>
          

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="UsuarioEstabelecimento"
                    data-url="view/UsuarioEstabelecimento/UsuarioEstabelecimento_form.php?id=<?php echo $result->getId()?>&idAutenticacao=<?php echo $result->getIdAutenticacao()?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="UsuarioEstabelecimento"
                    data-url="router.php?controller=UsuarioEstabelecimento&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getAtivo();?>>

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </div>

        </div>
    <?php } ?>
</div>