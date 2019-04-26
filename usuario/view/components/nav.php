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
            <div class="sub_menu" id="sub_menu_1">
                <ul>
                    <li onclick="chamarView('rede_social', 'view/rede_social/rede_social_form.php')">
                        <div>
                            <i class="fas fa-wrench"></i>
                            Rede Social
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
    </ul>

</nav>