<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerTextoPrincipal.php");

$controller = new ControllerTextoPrincipal();
$rs = $controller->buscarTextoPrincipal();

?>
<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Texto Principal
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Titulo</th>
            <th>Texto</th>
            <th>Página</th>
            
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($rs as $result) { ?>
            <tr>
            <td><?php echo $result->getTitulo(); ?></td>
                <td><?php echo $result->getTexto(); ?></td>
                <td><?php echo $result->getTipoTexto(); ?></td>

                <td>
                    <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="texto_principal"
                        data-url="view/texto_principal/texto_principal_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                
        </tr>
        <?php } ?>
    </tbody>