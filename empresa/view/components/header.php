<header class="header">
    <i id="nav" class="fas fa-bars" onclick="toggleMenu()"></i>
    <div>
        <img src="" alt="">
        <span>
            <?php 
                echo $_SESSION['usuario'];
            ?>
        </span>
        <a href="../index.php?modo=logout" onclick="sessionStorage.clear();">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</header>