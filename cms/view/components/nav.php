<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerMenu.php");
    $controller = new ControllerMenu();
    $IdMenu = array();
    $texto = null;
    $i = 0;
    $rs = $controller->buscarFuncionarioPermissoes();
?>
<nav id="barra_lateral" class="nav">
    
    <ul>
        <li>

            <!-- BOTÃO -->
            <div class="lista_btn" onclick="toggleSubMenu(this, 1, true)">
                <div>
                    <i class="fas fa-cog"></i>
                    CMS
                </div>
                <i class="fas fa-angle-right seta" id="seta_1"></i>
            </div>
            <!-- SUB MENU -->
            <div class="sub_menu" id="sub_menu_1" >
                <ul>
                   <?php 
                    foreach($rs as $result){
                        $IdMenu[] = $result->getIdMenu();

                        if($IdMenu[$i]==8){?>
                            <li onclick="chamarViewParaApp('noticias')"> 
                                <div>
                                    <i class="fas fa-wrench"></i>
                                    Notícias
                                </div>
                            </li>
                        <?php
                        } 
                        if($IdMenu[$i]==9){
                        ?>
                        <li onclick="chamarViewParaApp('historia')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Nossa História
                            </div>
                        </li>
                        <?php } 
                           if($IdMenu[$i]==16){
                        ?>

                        <li onclick="chamarViewParaApp('fale_conosco')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Fale Conosco
                            </div>
                        </li>
                        <?php }
                           if($IdMenu[$i]==5) {
                        ?>
                        <li onclick="chamarViewParaApp('sustentabilidade')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Sustentabilidade
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==7) {
                        ?>
                        <li onclick="chamarViewParaApp('promocao')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Promoção
                            </div>
                        </li>
                        <?php } 
                                if($IdMenu[$i]==6) {
                        ?>
                        <li onclick="chamarViewParaApp('produto')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Produto (Página de produtos)
                            </div>
                        </li>
                        <?php } 
                                if($IdMenu[$i]==10) {
                        ?>

                        <li onclick="chamarViewParaApp('mvv')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Missão, Visão e Valor
                            </div>
                        </li>

                        <?php } 
                                if($IdMenu[$i]==17) {
                        ?>

                        <li onclick="chamarViewParaApp('texto_principal')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Texto Principal
                            </div>
                        </li>

                        <?php } 
                                if($IdMenu[$i]==13) {
                        ?>

                        <li onclick="chamarViewParaApp('eventos')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Eventos
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==15) {
                        ?>

                        <li onclick="chamarViewParaApp('estabelecimento')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                E. Comercial
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==2) {
                        ?>
                        <li onclick="chamarViewParaApp('produto_destaque')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Produto em Destaque (Home)
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==4) {
                        ?>
                        <li onclick="chamarViewParaApp('sobre_nos')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Sobre Nós
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==12) {
                        ?>

                        <li onclick="chamarViewParaApp('videos')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Vídeos
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==14) {
                        ?>

                        <li onclick="chamarViewParaApp('patrocinio')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Patrocínio
                            </div>
                        </li>
                        
                        <?php } 
                            if($IdMenu[$i]==18) {
                        ?>

                        <li onclick="chamarViewParaApp('news_letter')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                News Letter
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==11) {
                        ?>
                        <li onclick="chamarViewParaApp('pops_escola')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Pops Escola
                            </div>
                        </li>
                        <?php } 
                            $i++;
                            
                    }?>
            </div>
        </li>
        <?php if($_SESSION['tipo'] == 'ROOT'){?>
        <li>
       
            <!-- BOTÃO -->
            <div class="lista_btn" onclick="toggleSubMenu(this, 2, true)">
                <div>
                    <i class="fas fa-cog"></i>
                    Alguma Coisa
                </div>
                <i class="fas fa-angle-right seta" id="seta_2"></i>
            </div>
            <!-- SUB MENU -->
            <div class="sub_menu" id="sub_menu_2">
                <ul>
                    <li onclick="chamarViewParaApp('funcionario')">
                        <div>
                            <i class="fas fa-wrench"></i>
                            Funcionario
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <?php }?>    
    </ul>
   
</nav>