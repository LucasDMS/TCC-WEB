<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerHistoria.php");

$controller = new controllerHistoria();
$rs = $controller->buscarHistoras();

?>

<button type="menu" onclick="callView('historia', 'form')">
    NOVO 
    <i class="fas fa-plus"></i>
</button>

<table class="tabela_padrao">
    <thead>

        <tr class="tabela_titlo">
            <th colspan="7">
                HISTORIA
            </th>
        </tr>
        <tr class="tabela_header">
            <th>texto</th>
            <th>ordem</th>
            <th colspan="3">Ações</th>
        </tr>

    </thead>

    <tbody>
        <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getTexto(); ?></td>
                <td><?php echo $result->getOrdem(); ?></td>

                <td>
                    <a  onclick="asyncRequest(this)"
                        href="#"
                        data-pagina="historia"
                        data-url="view/historia/historia_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncAtivate(this)" 
                        href="#"
                        data-pagina="historia"
                        data-url="router.php?controller=historia&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">

                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncDelete(this)" 
                        href="#"
                        data-pagina="historia"
                        data-url="router.php?controller=historia&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>