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
    $rs = $controller->listarPerguntas();
    $rs2 = $controller->listarEnquete();


?>

<div class="pagina_titulo">
    Enquete
    <button class="menu_novo" type="menu" onclick="chamarViewParaModal('enquete')">
        <i class="fas fa-plus"></i>
    </button>
</div>

<div class="card_wrapper">
    <?php foreach ($rs as $result) { 
        //if($a == 1){
        ?>
        <div class="card">
            <div>
                Pergunta : 

                <?php 
                
                    //echo de pergunta
                    echo $result->getPergunta(); 
                    
                    //recebe o id 
                    $idE = $result->getId();             
                    
                ?>
            </div>
            <div>
                Respostas : <br>   
                <?php  
                    
                    foreach($rs2 as $result2){
                        //se não for igual não pega a resposta
                        //só vai pegar a resposta se for igual o id
                        if($idE == $result2->getId()){
                            echo utf8_encode("<strong>".$result2->getResposta()."</strong> ".$result2->getVotos()." votos <br>"); 
                        }
                        
                        $a = 1;
                    }   
                    
                    
                     
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
                       
        }
    ?>
</div>