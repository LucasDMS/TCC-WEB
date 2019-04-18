<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerPopsEscola.php");
    $controller = new ControllerPopsEscola();
    $rs = $controller->buscarPopsEscola();
?>

<button type="menu" onclick="chamarViewParaModal('pops_escola')">
    NOVO
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Pops na Escola
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
                        data-pagina="pops_escola"
                        data-url="view/pops_escola/pops_escola_form.php?id=<?php echo $result->getId(); ?>"
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-pen"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="pops_escola"
                        data-url="router.php?controller=pops_escola&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getStatus(); ?>">

                        <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
                <td>
                    <a  onclick="asyncApagar(this)" 
                        href="#"
                        data-pagina="pops_escola"
                        data-url="router.php?controller=pops_escola&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">

                        <i class="fas fa-trash"></i>
                    </a>
                </td>
        </tr>
        <?php } ?>
    </tbody>
</table>