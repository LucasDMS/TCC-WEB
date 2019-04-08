<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 08/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Listagem do texto de video
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerPrincipalVideo.php");
    $controller = new ControllerPrincipalVideo();
    $consulta = $controller->listarPrincipalVideo();


?>


<button type="menu" onclick="chamarViewParaModal('principal_Video')">
    Novo
    <i class="fas fa-plus"></i>
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Texto Principal de Video
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Texto</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($consulta as $result){ ?>
        <tr>
            <td><?php echo $result->getTexto()?></td>
            <td>
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="principal_video"
                    data-url="view/principal_video/principal_video_form.php?id=<?php echo $result->getId(); ?>"
                    data-id="<?php echo $result->getId(); ?>">

                    <i class="fas fa-pen"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="principal_video"
                    data-url="router.php?controller=principal_video&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getStatus();?>>

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncApagar(this)"
                    href="#"
                    data-pagina="principal_video"
                    data-url="router.php?controller=principal_video&modo=excluir"
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