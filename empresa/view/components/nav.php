<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . "/_tcc/empresa" . "/controller/controllerMenuUsuarioEstabelecimento.php");
    $controller = new ControllerMenuUsuarioEstabelecimento();
?>
<nav id="barra_lateral" class="nav">

    <ul>
    <?php if($_SESSION['tipo'] == 'EMPRESAROOT'){?>
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

        <li>
    <?php } ?>
            <!-- BOTÃO -->
            <div class="lista_btn" onclick="toggleSubMenu(this, 2, true)">
                <div>
                    <i class="fas fa-cog"></i>
                    Alguma Coisa
                </div>
                <i class="fas fa-angle-right seta" id="seta_2"></i>
            </div>
            <!-- SUB MENU -->
           
        </li>
    </ul>

</nav>