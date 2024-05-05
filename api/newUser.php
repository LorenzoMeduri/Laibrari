<?php
    if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['nome']) || !isset($_POST['cognome']) 
    || !isset($_POST['codiceFiscale']) || !isset($_POST['nTelefono'])) { die("Non puoi usare l'API direttamente");}

    include("../conn.php");

    $sql = "INSERT INTO tCliente (CodiceFiscale, Nome, Cognome, Email, Password) 
            VALUES ('".$_POST['codiceFiscale']."','".$_POST['nome']."','".$_POST['cognome']."','".$_POST['email']."','".$_POST['password']."')";
    
    $rec = mysqli_query($conn,$sql);
    
    $sql = "INSERT INTO tTelefono (Numero, Cliente) VALUES (".$_POST['nTelefono'].", '".$_POST['codiceFiscale']."')";
    $rec = mysqli_query($conn,$sql);

    $_SESSION['auth'] = true;
?>