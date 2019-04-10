<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/ControllerProdutos.php");

$controller = new ControllerProdutos();
$rs = $controller->buscarProdutos();

?>

<button type="menu" onclick="chamarViewParaModal('promocao')">
    NOVO
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Promoção
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
                <td><?php echo $result->getNome(); ?></td>
                <td><?php echo $result->getDescricao(); ?>"</td>
                <td><?php ?></td>
            
                <td>
                    <a  onclick="asyncAtivar(this)" 
                        href="#"
                        data-pagina="produto"
                        data-url="router.php?controller=produtos&modo=ativar" 
                        data-id="<?php echo $result->getId(); ?>"
                        data-ativo="<?php echo $result->getAtivo(); ?>">

                        <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                        <i class="far fa<?php echo $ativo ?>-square"></i>
                    </a>
                </td>
                
        </tr>
        <?php } ?>
    </tbody>
</table>