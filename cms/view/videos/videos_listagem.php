<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 03/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de contatos
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerVideos.php");
    $controller = new ControllerVideos();
    $consulta = $controller->listarVideos();


?>


<button type="menu" onclick="chamarViewParaModal('eventos')">
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
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($consulta as $result){ ?>
        <tr>
            <td><?php echo $result->getTitulo()?></td>
            <td><?php echo $result->getLink()?></td>
            <td>
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="eventos"
                    data-url="view/eventos/eventos_form.php?id=<?php echo $result->getId();?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="eventos"
                    data-url="router.php?controller=eventos&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getStatus();?>>

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncApagar(this)"
                    href="#"
                    data-pagina="eventos"
                    data-url="router.php?controller=eventos&modo=excluir"
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