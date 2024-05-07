<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/> 
    <title>Prodotti</title>
    <?php session_start(); ?>
</head>
<header> <?php include("header.php"); ?> </header>
<body>
    <?php
        include("conn.php");
        $sql = "SELECT * FROM tProdotto 
        LEFT JOIN tRichiesta ON tProdotto.ISBN = tRichiesta.Prodotto 
        LEFT JOIN tAccettazione ON tRichiesta.id = tAccettazione.Richiesta 
        LEFT JOIN tRestituzione ON tAccettazione.id = tRestituzione.Accettazione 
        WHERE tRichiesta.id IN (SELECT MAX(id) FROM tRichiesta) OR tRichiesta.id IS NULL;";

        $rec = mysqli_query($conn,$sql);

        echo '<div id="elenco">';
            while($array = mysqli_fetch_array($rec)){
                echo '<div id="product-box">';
                    echo '<h1 id="titolo">'.$array['Titolo'].'</h1>';
                    echo '<a href="prodotto.php?ISBN='.$array['ISBN'].'"><img src="'.$array['PathFoto'].'"></img></a>';
                    echo '<button id="'.$array['ISBN'].'">PRENOTA</button>';
                echo '</div>';
            }
        echo '</div>';
    ?>
</body>
<script src="prenota.js"></script>
</html>