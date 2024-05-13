<?php
    if(!isset($_POST['isbn']))
        die("Non puoi usare l'API direttamente");

    include("../conn.php");
    
    if($_SESSION['auth'] != 0){
        $sql = 'CALL addPrenotazione("'.$_POST['isbn'].'", "'.$_SESSION['auth'].'")';
        $rec = mysqli_query($conn,$sql);
        
        echo 1;
    }else
        echo 0;
?>