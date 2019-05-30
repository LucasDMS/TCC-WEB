<nav id="barra_lateral" class="nav">

    <ul>
        <li>
            <!-- BOTÃO -->
            <div class="lista_btn" onclick="toggleSubMenu(this, 1, true)">
                <div>
                    Menu
                </div>
                <i class="fas fa-angle-right seta" id="seta_1"></i>
            </div>
            <!-- SUB MENU -->
            <div class="sub_menu" id="sub_menu_1">
                <ul>
                    <li onclick="chamarView('rede_social', 'view/rede_social/rede_social_listagem.php')">
                        <div>
                            Rede Social
                        </div>
                    </li>
                    <li onclick="chamarView('promocao', 'view/promocao/promocao_listagem.php')">
                        <div>
                            Promoções
                        </div>
                    </li>
                    <li onclick="chamarView('brinde', 'view/brinde/brinde_listagem.php')">
                        <div>
                            Brindes
                        </div>
                    </li>
                </ul>
            </div>
        </li>
    </ul>

</nav>