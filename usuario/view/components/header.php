<header class="header">
    <i id="nav" class="fas fa-bars" onclick="toggleMenu()"></i>

    <div>
        <img src="" alt="">
        <span>
            <?php 
                echo $_SESSION['usuario'];
            ?>
        </span>
        <i class="fas fa-sign-out-alt"></i>
    </div>
</header>