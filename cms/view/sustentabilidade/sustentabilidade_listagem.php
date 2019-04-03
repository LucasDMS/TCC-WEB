<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerSustentabilidade.php");

$controller = new ControllerSustentabilidade();
$rs = $controller->buscarSustentabilidades();

?>

<button type="menu" onclick="chamarViewParaModal('sustentabilidade')">
    NOVO
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Sustentabilidade
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
                <td><?php echo $result->getTexto(); ?></td>
                <td><?php ?></td>
            
                <td>
                    <a  onclick="asyncBuscarDados(this)"
                        href="#"
                        data-pagina="sustentabilidade"
                        data-url="view/sustentabilidade/sustentabilidade_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="sustentabilidade"
                        data-url="router.php?controller=sustentabilidade&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">

                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncApagar(this)" 
                        href="#"
                        data-pagina="sustentabilidade"
                        data-url="router.php?controller=sustentabilidade&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-trash"></i>
                    </a>
                </td>
        </tr>
        <?php } ?>
    </tbody>
</table>