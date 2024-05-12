<?php
    if(!isset($_POST['isbn']))
        die("Non puoi usare l'API direttamente");

    include("../conn.php");

    $sql = 'DELETE FROM tRichiesta WHERE Prodotto = "'.$_POST['isbn'].'" AND Cliente = "'.$_SESSION['auth'].'"';
    $rec = mysqli_query($conn,$sql);

    echo 1;
?>