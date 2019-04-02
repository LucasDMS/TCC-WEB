<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerNoticia.php");

$controller = new ControllerNoticia();
$rs = $controller->buscarNoticias();

?>

<button type="menu" onclick="chamarViewParaModal('noticias')">
    NOVO
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                NOTÍCIAS
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Titulo</th>
            <th>texto</th>
            
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getTitulo(); ?></td>
                <td><?php echo $result->getConteudo(); ?></td>

                <td>
                    <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="noticias"
                        data-url="view/noticias/noticias_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="noticias"
                        data-url="router.php?controller=noticias&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">

                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncApagar(this)" 
                        href="#"
                        data-pagina="noticias"
                        data-url="router.php?controller=noticias&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-trash"></i>
                    </a>
                </td>
        </tr>
        <?php } ?>
    </tbody>
</table>