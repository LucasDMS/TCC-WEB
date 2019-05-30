<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerTextoPrincipal.php");

$controller = new ControllerTextoPrincipal();
$rs = $controller->buscarTextoPrincipal();

?>

<div class="pagina_titulo">
    Texto Principal
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php foreach ($rs as $result) { ?>
        <div class="card">
            <div class="card-titulo"><?php echo utf8_encode($result->getTitulo());?></div>
            <div class="card-content"><?php echo utf8_encode($result->getTexto());?></div>
            <div class="card-content">Página de: <?php echo utf8_encode($result->getTipoTexto());?></div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="texto_principal"
                        data-url="view/texto_principal/texto_principal_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
            </div>

        </div>
    <?php } ?>
</div>