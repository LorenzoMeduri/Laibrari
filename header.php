<div class="logo">
    <a href="./"> <img id="logo" src="./img/logo.png" alt="Logo"> </a>
</div>
<nav>
    <ul>
        <li><a href="./">Home</a></li>
        <li><a href="prodotti.php">Prodotti</a></li>
        <?php
            if($_SESSION['auth'] == 1)
                echo '<li><a href="richieste.php">Richieste</a></li>';
            else
                echo '<li><a href="prenotazioni.php">Prenotazioni</a></li>';

            if($_SESSION['auth'] != 0)
                echo '<li id="logout"><a href="#">Logout</a></li>';
            else
                echo '<li><a href="login.php">Login</a></li>';
        ?>
    </ul>
</nav>
<script src="scripts/header.js"></script>