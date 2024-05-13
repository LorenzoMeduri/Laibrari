<?php
    if(!isset($_POST['isbn']))
        die("Non puoi usare l'API direttamente");

    include("../conn.php");

    $sql = 'CALL eliminaPrenotazione("'.$_POST['isbn'].'", "'.$_SESSION['auth'].'")';
    $rec = mysqli_query($conn,$sql);

    echo 1;
?>