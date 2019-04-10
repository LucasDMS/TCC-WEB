<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 09/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: listagem de news_letter
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerNewsLetter.php");
    $controller = new ControllerNewsLetter();
    $consulta = $controller->listarNewsLetter();


?>


<button type="menu" onclick="chamarViewParaModal('news_letter')">
    Novo
    <i class="fas fa-plus"></i>
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                News_Letter
            </th>
        </tr>
        <tr class="tabela_header">
            <th>email</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($consulta as $result){ ?>
        <tr>
            <td><?php echo $result->getNew_letter()?></td>
            
            <td>
                <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </td>
            
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>