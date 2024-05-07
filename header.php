<div class="logo">
    <a href="./"> <img id="logo" src="./img/logo.png" alt="Logo"> </a>
</div>
<nav>
    <ul>
        <li><a href="./">Home</a></li>
        <li><a href="prodotti.php">Prodotti</a></li>
        <li><a href="prenotazioni.php">Prenotazioni</a></li>
        <?php
            if($_SESSION['auth'] != 0)
                echo '<li id="logout"><a href="#">Logout</a></li>';
            else
                echo '<li><a href="login.php">Login</a></li>';
        ?>
    </ul>
</nav>
<script>
    document.getElementById("logout").addEventListener('click', logout);


    function logout(){
        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'api/logout.php',true);

        xhr.onload = function(){
            if(this.status == 200){
                document.getElementById("logout").innerHTML = '<a href="login.php">Login</a>';
            }
        }
        
        xhr.send();
    }
</script>