<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/cms" . "/controller/controllerMenu.php");
    $controller = new ControllerMenu();
    $paginas = array();
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
                        $paginas[] = $result->getPaginas();
                        if($paginas[$i]=='Fique por Dentro'){?>
                            <li onclick="chamarViewParaApp('noticias')"> 
                                <div>
                                    <i class="fas fa-wrench"></i>
                                    Noticias
                                </div>
                            </li>
                        <?php
                        } 
                        ?>
                   <?php if($paginas[$i]=='Nossa História'){?>
                        <li onclick="chamarViewParaApp('historia')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Nossa História
                            </div>
                        </li>
                        <?php } 
                        
                        
                    
                           if($paginas[$i]=='Fale Conosco'){
                        ?>

                        <li onclick="chamarViewParaApp('fale_conosco')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Fale Conosco
                            </div>
                        </li>
                           <?php }
                           if($paginas[$i]=='Sustentabilidade') {
                        ?>
                        <li onclick="chamarViewParaApp('sustentabilidade')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Sustentabilidade
                            </div>
                        </li>
                           <?php }  
                            $i++;
                        }?>
                        <?php ?>
                        <li onclick="chamarViewParaApp('promocao')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Promoção
                            </div>
                        </li>
                        <li onclick="chamarViewParaApp('produto')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Produto (Página de produtos)
                            </div>
                        </li>
                        <li onclick="chamarViewParaApp('mvv')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                MVV
                            </div>
                        </li>
                        <li onclick="chamarViewParaApp('texto_principal')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Texto Principal
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('eventos')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Eventos
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('estabelecimento')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                E. Comercial
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('produto_destaque')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Produto em Destaque (Home)
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('sobre_nos')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Sobre Nós
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('videos')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Videos
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('patrocinio')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Patrocinio
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('news_letter')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                News Letter
                            </div>
                        </li>

                        <li onclick="chamarViewParaApp('pops_escola')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Pops Escola
                            </div>
                        </li>

                    </ul>
            </div>
        </li>
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
        <li onclick="chamarViewParaApp('funcionario')">
            <div>
                <i class="fas fa-wrench"></i>
                Funcionario
            </div>
        </li>

        <li onclick="chamarViewParaApp('pops_escola')">
            <div>
                <i class="fas fa-wrench"></i>
                Pops Escola
            </div>
        </li>
        <li onclick="chamarViewParaApp('usuario_estabelecimento')">
            <div>
                <i class="fas fa-wrench"></i>
               AAAAAAAAAAAAA
            </div>
        </li>
        
    </ul>
   
</nav>