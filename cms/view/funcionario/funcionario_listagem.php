<?php 
 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/ControllerFuncionario.php");
    $controller = new ControllerFuncionario();
    $consulta = $controller->buscarFuncionario();


?>



<button type="menu" onclick="chamarViewParaModal('funcionario')">
    Novo
    <i class="fas fa-plus"></i>
</button>

<table class="tabela_padrao">
    <thead>
        <tr class="tabela_titlo">
            <th colspan="7">
                Funcionario
            </th>
        </tr>
        <tr class="tabela_header">
            <th>Nome</th>
            <th>Cargo</th>
            <th colspan="3">Ações</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($consulta as $result){ ?>
        <tr>
            <td><?php echo $result->getNome()?></td>
            <td><?php echo $result->getCargo()?></td>
            <td>
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="funcionario"
                    data-url="view/funcionario/funcionario_form.php?id=<?php echo $result->getId();?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>
            </td>
            <td>
                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="funcionario"
                    data-url="router.php?controller=funcionario&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getAtivo();?>>

                    <?php $ativo = ($result->getAtivo()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>
            </td>
            
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>