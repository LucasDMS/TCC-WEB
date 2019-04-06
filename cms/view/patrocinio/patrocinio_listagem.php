<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerPatrocinio.php");
$controller = new ControllerPatrocinio();
$rs = $controller->buscarPatrocinio();
?>

<button type="menu" onclick="chamarViewParaModal('patrocinio')">
    NOVO
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Patrocinio
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Nome</th>
            <th>Descricao</th>
            <th>Imagem</th>
            
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getNome(); ?></td>
                <td><?php echo $result->getDescricao(); ?></td>
                <td><img src="<?php echo $result->getImagem(); ?>"/></td>
            
                <td>
                    <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="patrocinio"
                        data-url="view/patrocinio/patrocinio_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="patrocinio"
                        data-url="router.php?controller=patrocinio&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getStatus(); ?>">

                        <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncApagar(this)" 
                        href="#"
                        data-pagina="patrocinio"
                        data-url="router.php?controller=patrocinio&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-trash"></i>
                    </a>
                </td>
        </tr>
        <?php } ?>
    </tbody>
</table>