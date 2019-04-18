<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: listagem de Videos
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerVideos.php");
    $controller = new ControllerVideos();
    $rs = $controller->listarVideos();


?>

<div class="pagina_titulo">
    Videos
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('videos')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div>
                Título : 
                <?php echo $result->getTitulo(); ?>
            </div>
            <div>
                Link : 
                <?php echo $result->getLink(); ?>
            </div>
            <div>
                Descrição : 
                <?php echo $result->getDescricao(); ?>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="videos"
                    data-url="view/videos/videos_form.php?id=<?php echo $result->getId();?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="videos"
                    data-url="router.php?controller=videos&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getStatus();?>>

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)"
                    href="#"
                    data-pagina="videos"
                    data-url="router.php?controller=videos&modo=excluir"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-trash"></i>
                </a> 
            </div>

        </div>
    <?php } ?>
</div>