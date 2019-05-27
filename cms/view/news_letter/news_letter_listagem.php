<?php 
     /*
        Projeto: TCC
        Autor: Nicolas
        Data Criação: 09/04/2019
        Data Modificação:
        Conteúdo Modificado:
        Autor da Modificação:
        Objetivo da classe: listagem de news_letter
    */
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" ."/controller/controllerNewsLetter.php");
    $controller = new ControllerNewsLetter();
    $rs = $controller->listarNewsLetter();
   

?>

<div class="pagina_titulo">
    Newsletter
</div>

<div class="card_wrapper">
    <table class="tabela-nl">
        <tr>
            <th>E-mail</th>
        </tr>
        <?php foreach ($rs as $result) { ?>
            <tr>
                <td><?php echo $result->getNewLetter()?></td>
            </tr>
        <?php } ?> 
    </table>
</div>