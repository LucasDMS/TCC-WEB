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
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerEventos.php");
    $controller = new ControllerEventos();
    $consulta = $controller->listarEventos();


?>



<button type="menu" onclick="chamarViewParaModal('eventos')">
    Novo
    <i class="fas fa-plus"></i>
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Eventos
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Titulo</th>
            <th>Descricao</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($consulta as $result){ ?>
        <tr>
            <td><?php echo $result->getNome()?></td>
            <td><?php echo $result->getDescricao()?></td>
            <td><i class="fas fa-pen"></i></td>
            <td><i class="far fa-check-square"></i></td>
            <td><i class="fas fa-trash"></i></td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>