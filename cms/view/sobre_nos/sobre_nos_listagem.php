<?php 

/* 
    Projeto: MVC página de listagem do Sobre_Nos.
    Autor: Kelvin
    Data Criação: 08/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: listagem do Sobre_Nos.
*/

require_once($_SERVER['DOCUMENT_ROOT']. "/_tcc/cms" . "/controller/controllerSobre_Nos.php");

$controller = new controllerSobre_Nos();
$rs = $controller->buscarSobre_Nos();

?>

<button type="menu" onclick="chamarViewParaModal('sobre_nos')">
    NOVO 
    <i class="fas fa-plus"></i>
</button>

<table class="tabela_padrao">
    <thead>

        <tr class="tabela_titlo">
            <th colspan="7">
                Sobre Nós
            </th>
        </tr>
        <tr class="tabela_header">
            <th>titulo</th>
            <th>texto</th>
            <th colspan="4">Ações</th>
        </tr>

    </thead>
    
   <tbody>
        <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getTitulo(); ?></td>
                <td><?php echo $result->getTexto(); ?></td>
                <td><?php echo $result->getOrdem(); ?></td>

                <td>
                    <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="sobre_nos"
                        data-url="view/sobre_nos/sobre_nos_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="sobre_nos"
                        data-url="router.php?controller=sobre_nos&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">

                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncApagar(this)" 
                        href="#"
                        data-pagina="sobre_nos"
                        data-url="router.php?controller=sobre_nos&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>