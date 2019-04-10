<?php

/* 
    Projeto: MVC página de listagem do Estabelecimento.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem do Estabelecimento.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/controller/controllerEstabelecimento.php");

$controller = new controllerEstabelecimento();
$rs = $controller->buscarEstabelecimento();

?>


<table class="tabela_padrao">
    <thead>

        <tr class="tabela_titlo">
            <th colspan="7">
                ESTABELECIMENTO COMERCIAL
            </th>
        </tr>
        <tr class="tabela_header">
            <th>texto</th>
            <th>Imagem</th>
            <th>Descrição</th>
            <th colspan="3">Ações</th>
        </tr>

    </thead>

    <tbody>
        <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getNome(); ?></td>
                <td></td>
                <td><?php echo $result->getTexto(); ?></td>
                <td> 
                    <a onclick="asyncAtivar(this)"
                        href="#"
                        data-pagina="estabelecimento"
                        data-url="router.php?controller=estabelecimento&modo=ativar"
                        data-id="<?php echo $result->getId();?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">

                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>   
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>