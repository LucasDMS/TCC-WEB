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
    $consulta = $controller->listarVideos();


?>


<button type="menu" onclick="chamarViewParaModal('videos')">
    Novo
    <i class="fas fa-plus"></i>
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Videos
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Titulo</th>
            <th>Link</th>
            <th>Descricao</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($consulta as $result){ ?>
        <tr>
            <td><?php echo $result->getTitulo()?></td>
            <td><?php echo $result->getLink()?></td>
            <td><?php echo $result->getDescricao()?></td>
            <td>
                <a  onclick="asyncBuscarDados(this)"
                href="#"
                    data-pagina="videos"
                    data-url="view/videos/videos_form.php?id=<?php echo $result->getId();?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="videos"
                    data-url="router.php?controller=videos&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getStatus();?>>

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncApagar(this)"
                    href="#"
                    data-pagina="videos"
                    data-url="router.php?controller=videos&modo=excluir"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>