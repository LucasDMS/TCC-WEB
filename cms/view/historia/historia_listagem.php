<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerHistoria.php");

$controller = new controllerHistoria();
$rs = $controller->buscarHistoras();

?>

<button type="menu" onclick="buscarForm('historia')">
    NOVO
</button>

<table class="tabela_padrao">
    <thead>

        <tr class="tabela_titlo">
            <th colspan="7">
                HISTORIA
            </th>
        </tr>
        <tr class="tabela_header">
            <th>id</th>
            <th>texto</th>
            <th>status</th>
            <th>ordem</th>
            <th colspan="3">Ações</th>
        </tr>

    </thead>

    <tbody>
        <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getId(); ?></td>
                <td><?php echo $result->getTexto(); ?></td>
                <td><?php echo $result->getStatus(); ?></td>
                <td><?php echo $result->getOrdem(); ?></td>

                <td>
                    <a  onclick="asyncRequest(this)"
                        href="#"
                        data-url="router.php?controller=historia&modo=editar"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncRequest(this)" 
                        href="#"
                        data-url="router.php?controller=historia&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">
                        
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>