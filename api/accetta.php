<?php
    if(!isset($_POST['idRichiesta']))
        die("Non puoi usare l'API direttamente");

    include("../conn.php");

    $sql = 'INSERT INTO tAccettazione (Richiesta, Addetto, Data)
            VALUES ('.$_POST['idRichiesta'].', 1, CURDATE())'; // Addetto Hardcoded

    $rec = mysqli_query($conn,$sql);

    $sql = 'SELECT id FROM tAccettazione WHERE id = (SELECT MAX(id) FROM tAccettazione)';
    $rec = mysqli_query($conn,$sql);
    $array = mysqli_fetch_array($rec);

    echo $array['id'];
?>