<?php
    if(!isset($_POST['idAccettazione']))
        die("Non puoi usare l'API direttamente");

    include("../conn.php");

    $sql = 'INSERT INTO tRestituzione (Accettazione, Addetto, Data)
            VALUES ('.$_POST['idAccettazione'].', 1, CURDATE())'; // Addetto Hardcoded

    $rec = mysqli_query($conn,$sql);
?>