<?php
    /* 
    Projeto: TCC
    Autor: Nicolas
    Data Criação: 27/04/2019
    Data Modificação:
    Conteúdo Modificado:
    Autor da Modificação:
    Objetivo da Classe: Classe de listagem.
    */

    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerSetores.php");
    $controller = new controllerSetores();
    $rs = $controller->listarSetores();


?>

<div class="pagina_titulo">
    SETORES
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('setores')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <?php foreach ($rs as $result) { 
        //if($a == 1){
        ?>
        <div class="card">
            <div>
                RUA : 

                <?php 
                    //echo de pergunta
                    echo utf8_encode($result->getRua());
                    
                ?>
            </div>
            <div>
                PRATELEIRA : <br>   
                <?php  
         
                    echo utf8_encode($result->getPrateleira()); 
                        
                ?>
            </div>
            <div>
                CAPACIDADE : 
                <?php echo utf8_encode($result->getCapacidade()); ?>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="setores"
                    data-url="view/setores/setores_form.php?id=<?php echo $result->getId();?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="setores"
                    data-url="router.php?controller=setores&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getStatus();?>>

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)"
                    href="#"
                    data-pagina="setores"
                    data-url="router.php?controller=setores&modo=excluir"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php 
                       
        }
    ?>
</div>