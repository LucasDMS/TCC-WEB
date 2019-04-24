<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 22/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: Classe de listagem
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" ."/controller/controllerEnquete.php");
    $controller = new controllerEnquete();
    $rs = $controller->listarEnquete();


?>

<div class="pagina_titulo">
    Enquete
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('enquete')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <!-- CARD -->
    <?php $controle = 1;     
       
    ?>
    <?php foreach ($rs as $result) { 
        if($controle == $result->getId()){
        ?>
        <div class="card">
            <div>
                Pergunta : 

                <?php 
                
                    echo $result->getPergunta(); 
                    
                ?>
            </div>
            <div>
                Respostas :     
                <?php  
                    foreach($rs as $result){
                        if($result->getId() == $controle){
                            echo utf8_encode($result->getResposta()." ".$result->getVotos()." votos <br>"); 
                        }
                    }
                    //while(!$controle == $result->getId()){
                        
                        
                        $controle++; 
                    //}
                     
                ?>
            </div>
            <div>
                Data : 
                <?php echo $result->getData(); ?>
            </div>

            <div class="card_operadores">
                <a  onclick="asyncBuscarDados(this)"
                    href="#"
                    data-pagina="enquete"
                    data-url="view/enquete/enquete_form.php?id=<?php echo $result->getId();?>"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-pen"></i>
                </a>

                <a  onclick="asyncAtivar(this)"
                    href="#"
                    data-pagina="enquete"
                    data-url="router.php?controller=enquete&modo=ativar"
                    data-id="<?php echo $result->getId();?>"
                    data-ativo = <?php echo $result->getStatus();?>>

                    <?php $ativo = ($result->getStatus()==1) ? "-check" : "" ; ?>
                    <i class="far fa<?php echo $ativo ?>-square"></i>
                </a>

                <a  onclick="asyncApagar(this)"
                    href="#"
                    data-pagina="enquete"
                    data-url="router.php?controller=enquete&modo=excluir"
                    data-id="<?php echo $result->getId();?>">

                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
    <?php 
            }else{
               
            }
        }
    ?>
</div>