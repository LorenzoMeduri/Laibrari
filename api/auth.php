<?php
    if(!isset($_POST['email']) || !isset($_POST['password'])) { die("Non puoi usare l'API direttamente"); }

    include("../conn.php");

    $sql = 'SELECT CodiceFiscale FROM tCliente WHERE Email = "'.$_POST['email'].'" AND Password = "'.md5($_POST['password']).'"';
    $rec = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($rec);
    $result = mysqli_fetch_array($rec);

    if($num != 0){
        echo 1;
        $_SESSION['auth'] = $result['CodiceFiscale'];
    }else{
        $sql = 'SELECT EXISTS (SELECT NULL FROM tAddetto WHERE Email = "'.$_POST['email'].'" AND Password = "'.$_POST['password'].'") AS result;';
        $rec = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($rec);
        if($result['result'] == 1){
            $_SESSION['auth'] = 1;
            echo 1;
        }else{
            echo 0;
        }
    }
?>