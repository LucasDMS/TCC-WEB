<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerFaleConosco.php");

$controller = new ControllerFaleConosco();
$rs = $controller->buscarFaleConosco();

?>


<table class="tabela_padrao">
    <thead>

        <tr class="tabela_titlo">
            <th colspan="7">
                FALE CONOSCO
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
                <td><?php echo $result->getNome(); ?></td>
                <td><?php echo $result->getEmail(); ?></td>

                <td>
                    <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="fale_conosco"
                        data-url="view/fale_conosco/fale_conosco_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="fale_conosco"
                        data-url="router.php?controller=fale_conosco&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getStatus(); ?>">

                        <?php $status = ($result->getStatus()=='Lido') ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $status ?>-square"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>