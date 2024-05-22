<?php
    if(!isset($_POST['isbn']))
        die("Non puoi usare l'API direttamente");

    include("../conn.php");
    
    if($_SESSION['auth'] != 0 && $_SESSION['auth'] != 1){
        $sql = 'CALL addPrenotazione("'.$_POST['isbn'].'", "'.$_SESSION['auth'].'")';
        $rec = mysqli_query($conn,$sql);
        
        echo 1;
    }else if($_SESSION['auth'] == 1){
            echo 2;
        }else{
            echo 0;
        }
?>