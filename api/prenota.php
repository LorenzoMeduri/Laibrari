<?php
    if(!isset($_POST['isbn']))
        die("Non puoi usare l'API direttamente");

    include("../conn.php");
    
    if($_SESSION['auth'] != 0){
        $sql = 'INSERT INTO tRichiesta (Prodotto, Cliente, Data) VALUES ("'.$_POST['isbn'].'", "'.$_SESSION['auth'].'", CURDATE())';
        $rec = mysqli_query($conn,$sql);
        
        echo 1;
    }else
        echo 0;
?>