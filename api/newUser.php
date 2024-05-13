<?php
    if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['nome']) || !isset($_POST['cognome']) 
    || !isset($_POST['codiceFiscale']) || !isset($_POST['nTelefono'])) { die("Non puoi usare l'API direttamente");}

    include("../conn.php");

    $sql = 'CALL addUser("'.$_POST['codiceFiscale'].'", "'.$_POST['nome'].'", "'.$_POST['cognome'].'", "'.$_POST['email'].'", "'.md5($_POST['password']).'")';
    
    $rec = mysqli_query($conn,$sql);
    
    $sql = 'CALL addPhone('.$_POST['nTelefono'].', "'.$_POST['codiceFiscale'].'")';
    $rec = mysqli_query($conn,$sql);

    $_SESSION['auth'] = $_POST['codiceFiscale'];
?>