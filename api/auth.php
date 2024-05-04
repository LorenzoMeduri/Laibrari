<?php
    if(!isset($_POST['email']) || !isset($_POST['password'])) { die("Non puoi usare l'API direttamente"); }

    include("../conn.php");

    $sql = "SELECT EXISTS (SELECT NULL FROM tCliente WHERE Email = '".$_POST['email']."' AND Password = '".$_POST['password']."') AS result;";
    $rec = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($rec);
    
    echo $result['result'];

    if($result == 1)
        $_SESSION['auth'] = true;
    else
        $_SESSION['auth'] = false;
?>