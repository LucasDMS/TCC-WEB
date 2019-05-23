<?php 
 require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/usuario" ."/controller/controllerCarrinho.php");
$controller = new ControllerCarrinho();
$rs = $controller->buscarCarrinho();
$valorTotal = 0;

?>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                <strong>Carrinho de Compras</strong> 
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Nome:</th>
            <th>Imagem:</th>
            <th>Descricao:</th>
            <th>Quantidade Fardo:</th>
            <th>Preco Fardo:</th>
            
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php 
    $i = 0;
    foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getNome(); ?></td>
                <td><img src="../cms/<?php echo $result->getImagem(); ?>" height="40%"/></td>
                <td><?php echo $result->getDescricao(); ?></td>
                <td>
                    <input type="number" name="txt_qtd[]" id="txt_qtd[]" value="<?php echo $result->getQuantidade(); ?>" class="input_carrinho"/>
                </td>
                <td>
                        
                    
                </td>
               
                <td>
                    <a  onclick="asyncApagar(this)" 
                        href="#"
                        data-pagina="carrinho"
                        data-url="router.php?controller=carrinho&modo=excluir" 
                        data-id="<?php echo $result->getId(); ?>">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
        </tr>
    <?php 
    $i++;    
    } ?>
    </tbody>
    <tbody>
        <tr>    
            <td></td>
            <td></td>
            <td></td>
            <td><strong><p>Total:</p></strong></td>
            
            <td id="resultado">
                <strong><p> R$:</p></strong>
            </td>
            <td colspan="4">
                <button type="menu" onclick="chamarViewParaModal('carrinho')">                                                                                                                                                                                                                                  
                    Comprar
                </button>
            </td>
        </tr>
    </tbody>
</table>