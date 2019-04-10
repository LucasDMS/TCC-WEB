<?php 

/* 
    Projeto: MVC página de listagem do Produto em Destaque.
    Autor: Kelvin
    Data Criação: 06/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem do Produto em Destaque.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/controller/controllerProduto_Destaque.php");

$controller = new controllerProduto_Destaque();
$rs = $controller->buscarProduto_Destaque();

?>



<table class="tabela_padrao">
    <thead>

        <tr class="tabela_titlo">
            <th colspan="7">
                PRODUTO DESTAQUE
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
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="produto_destaque"
                        data-url="router.php?controller=produto_destaque&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">

                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>