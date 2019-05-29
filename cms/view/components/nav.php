<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/cms" . "/controller/controllerMenu.php");
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
                <div>CMS</div>
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
                                    Notícias
                                </div>
                            </li>
                        <?php
                        } 
                        if($IdMenu[$i]==9){
                        ?>
                        <li onclick="chamarViewParaApp('historia')">
                            <div>
                                Nossa História
                            </div>
                        </li>
                        <?php } 
                           if($IdMenu[$i]==16){
                        ?>

                        <li onclick="chamarViewParaApp('fale_conosco')">
                            <div>
                                Fale Conosco
                            </div>
                        </li>
                        <?php }
                           if($IdMenu[$i]==5) {
                        ?>
                        <li onclick="chamarViewParaApp('sustentabilidade')">
                            <div>
                                Sustentabilidade
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==7) {
                        ?>
                        <li onclick="chamarViewParaApp('promocao')">
                            <div>
                                Promoção
                            </div>
                        </li>
                        <?php } 
                                if($IdMenu[$i]==6) {
                        ?>
                        <li onclick="chamarViewParaApp('produto')">
                            <div>
                                Produto (Página de produtos)
                            </div>
                        </li>
                        <?php } 
                                if($IdMenu[$i]==10) {
                        ?>

                        <li onclick="chamarViewParaApp('mvv')">
                            <div>
                                Missão, Visão e Valor
                            </div>
                        </li>

                        <?php } 
                                if($IdMenu[$i]==17) {
                        ?>

                        <li onclick="chamarViewParaApp('texto_principal')">
                            <div>
                                Texto Principal
                            </div>
                        </li>

                        <?php } 
                                if($IdMenu[$i]==13) {
                        ?>

                        <li onclick="chamarViewParaApp('eventos')">
                            <div>
                                Eventos
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==15) {
                        ?>

                        <li onclick="chamarViewParaApp('estabelecimento')">
                            <div>
                                E. Comercial
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==2) {
                        ?>
                        <li onclick="chamarViewParaApp('produto_destaque')">
                            <div>
                                Produto em Destaque (Home)
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==4) {
                        ?>
                        <li onclick="chamarViewParaApp('sobre_nos')">
                            <div>
                                Sobre Nós
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==12) {
                        ?>

                        <li onclick="chamarViewParaApp('videos')">
                            <div>
                                Vídeos
                            </div>
                        </li>

                        <?php } 
                            if($IdMenu[$i]==14) {
                        ?>

                        <li onclick="chamarViewParaApp('patrocinio')">
                            <div>
                                Patrocínio
                            </div>
                        </li>
                        
                        <?php } 
                            if($IdMenu[$i]==18) {
                        ?>

                        <li onclick="chamarViewParaApp('news_letter')">
                            <div>
                                News Letter
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==11) {
                        ?>
                        <li onclick="chamarViewParaApp('pops_escola')">
                            <div>
                                Pops Escola
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==3) {
                        ?>
                        <li onclick="chamarViewParaApp('enquete')">
                            <div>
                                Enquete
                            </div>
                        </li>
                        <?php } 
                            if($IdMenu[$i]==21) {
                        ?>
                        <li onclick="chamarViewParaApp('cores')">
                            <div>
                                Cores
                            </div>
                        </li>
                        <?php } 
                            $i++;
                            
                    }?>
                </ul>     
            </div>
        </li>
        <?php if($_SESSION['tipo'] == 'ROOT'){?>
        <li>
       
            <!-- BOTÃO -->
            <div class="lista_btn" onclick="toggleSubMenu(this, 2, true)">
                <div>Outros</div>
                <i class="fas fa-angle-right seta" id="seta_2"></i>
            </div>
            <!-- SUB MENU -->
            <div class="sub_menu" id="sub_menu_2">
                <ul>
                    <li onclick="chamarViewParaApp('funcionario')">
                        <div>
                            Cadastro de Funcionario
                        </div>
                    </li>
                    <li onclick="chamarViewParaApp('setores')">
                        <div>
                            Setores
                        </div>
                    </li>
                    <li onclick="chamarViewParaApp('materia_prima')">
                        <div>
                            Matéria Prima
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <?php }?>    
    </ul>
   
</nav>