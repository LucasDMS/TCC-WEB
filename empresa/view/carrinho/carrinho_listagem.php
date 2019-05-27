<?php 
 require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" ."/controller/controllerCarrinho.php");
$controller = new ControllerCarrinho();
$rs = $controller->buscarCarrinho();
$total = 0;
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
    <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getNome(); ?></td>
                <td><img src="../cms/<?php echo $result->getImagem(); ?>" height="40%"/></td>
                <td><?php echo $result->getDescricao(); ?></td>
                <td>
                    <input type="number" name="txt_qtd" id="txt_qtd<?php echo $result->getId()?>" value="<?php echo $result->getQuantidade(); ?>" class="input_carrinho" onchange="totalCompra(<?php echo $result->getPreco(); ?>,<?php echo $result->getId()?>)" />
                </td>
                <td>
                    <input type="text" id="txt_resultado<?php echo $result->getId()?>" value="<?php echo $result->getPreco(); ?>">
                    <?php
                        $total = $total + $result->getPreco();
                    ?>
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
    <?php } ?>
    </tbody>
    <tbody>
        <tr>    
            <td></td>
            <td></td>
            <td></td>
            <td><strong><p>Total:</p></strong></td>
            <td>
                <strong><p><input type="text" id="resultadoFinal" value="<?php echo $total?>"></p></strong>
            </td>
            <td colspan="4">
                <button type="menu" onclick="chamarViewParaModal('carrinho')">                                                                                                                                                                                                                                  
                    Comprar
                </button>
            </td>
        </tr>
    </tbody>
</table>
<script>

    
    function totalCompra(preso,id){

        valor = document.getElementById("txt_qtd"+id).value
        document.getElementById("txt_resultado"+id).value = valor*preso
       
        document.getElementById("resultadoFinal").value = Number(document.getElementById("resultadoFinal").value) + Number(document.getElementById("txt_resultado"+id).value)
      
        totalCompra = totalCompra + document.getElementById("txt_resultado"+id).value;

    }

</script>