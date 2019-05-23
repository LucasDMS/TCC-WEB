<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/tcc/empresa" . "/controller/controllerMenuUsuarioEstabelecimento.php");
    $controller = new ControllerMenuUsuarioEstabelecimento();
    $IdMenu = array();
    $texto = null;
    $i = 0;
    $rs = $controller->buscarUsuarioPermissoes();
?>
<nav id="barra_lateral" class="nav">

    <ul>
    <?php
    if($_SESSION['tipo'] == 'EMPRESAROOT'){?>
        <li>
            <!-- BOTÃO -->

            <div class="lista_btn" onclick="toggleSubMenu(this, 1, true)">
                <div>
                    <i class="fas fa-cog"></i>
                    Usuários
                </div>
                <i class="fas fa-angle-right seta" id="seta_1"></i>
            </div>
            <!-- SUB MENU -->
            <div class="sub_menu" id="sub_menu_1">
                <ul>
                    
                    <li onclick="chamarViewParaApp('usuario_estabelecimento')">
                        <div>
                            <i class="fas fa-wrench"></i>
                            Usuários cadastrados
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
                        Menu
                    </div>
                    <i class="fas fa-angle-right seta" id="seta_2"></i>
            </div>
            <!-- SUB MENU -->
            <div class="sub_menu" id="sub_menu_2">
            <ul>
                <li onclick="chamarViewParaApp('compras')">
                    <div>
                        <i class="fas fa-wrench"></i>
                        Comprar
                    </div>
                </li>
            </ul>
            <ul>
                <li onclick="chamarViewParaApp('usuario_estabelecimento')">
                    <div>
                        <i class="fas fa-wrench"></i>
                        Ver histórico
                    </div>
                </li>
            </ul>
            <ul>
                <li onclick="chamarViewParaApp('marketing')">
                    <div>
                        <i class="fas fa-wrench"></i>
                        Crie seu marketing
                    </div>
                </li>
            </ul>
            <ul>
                <li onclick="chamarViewParaApp('usuario_estabelecimento')">
                    <div>
                        <i class="fas fa-wrench"></i>
                        Solicitar divulgação
                    </div>
                </li>
            </ul>
        </li>
        <?php } 
           if($_SESSION['tipo'] == 'EMPRESA'){
        ?>
        <li>
        
            <!-- BOTÃO -->
            <div class="lista_btn" onclick="toggleSubMenu(this, 2, true)">
                <div>
                    <i class="fas fa-cog"></i>
                    Menu
                </div>
                <i class="fas fa-angle-right seta" id="seta_2"></i>
            </div>
            <!-- SUB MENU -->
            <div class="sub_menu" id="sub_menu_2">
            
               <?php
                foreach($rs as $result){
                    $IdMenu[] = $result->getIdMenu();
                    if($IdMenu[$i]==1){?>
                    <ul>
                        <li onclick="chamarViewParaApp('compras')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Comprar
                            </div>
                        </li>
                    </ul>
                    <?php } 
                    if($IdMenu[$i]==2){
                    ?>
                    <ul>
                        <li onclick="chamarViewParaApp('compras')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Compras
                            </div>
                        </li>
                    </ul>
                    <?php } 
                    if($IdMenu[$i]==3){
                    ?>
                    <ul>
                        <li onclick="chamarViewParaApp('marketing')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Crie seu marketing
                            </div>
                        </li>
                    </ul>
                    <?php } 
                    if($IdMenu[$i]==4){
                    ?>
                    <ul>
                        <li onclick="chamarViewParaApp('usuario_estabelecimento')">
                            <div>
                                <i class="fas fa-wrench"></i>
                                Solicitar divulgação
                            </div>
                        </li>
                    </ul>
                    <?php } 
                    $i++;
                }
            }
                    ?>
        </li>
    </ul>

</nav>