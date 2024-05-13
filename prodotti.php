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
        $sql = "SELECT tabellona.ISBN, tabellona.Titolo, tabellona.PathFoto
        FROM
        (
        SELECT ROW_NUMBER() OVER (PARTITION BY tProdotto.ISBN ORDER BY tRichiesta.id DESC) AS NRiga, tProdotto.ISBN, tProdotto.Titolo, tProdotto.PathFoto, tRichiesta.id AS idRichiesta, tRestituzione.id AS idRestituzione
            FROM tProdotto LEFT OUTER JOIN tRichiesta ON tProdotto.ISBN = tRichiesta.Prodotto
                 LEFT OUTER JOIN tAccettazione ON tRichiesta.id = tAccettazione.Richiesta
                 LEFT OUTER JOIN tRestituzione ON tAccettazione.id = tRestituzione.Accettazione
        ) AS tabellona
        WHERE (tabellona.idRichiesta IS NULL OR tabellona.idRestituzione IS NOT NULL) AND (NRiga = 1);";

        $rec = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($rec);

        if($num == 0){
            echo '<h1 id="libriNonDisponibili"> NESSUN LIBRO DISPONIBILE</h1>';
        }else{
            echo '<div id="elenco">';
                while($array = mysqli_fetch_array($rec)){
                    echo '<div id="product-box">';
                        echo '<h1 id="titolo">'.$array['Titolo'].'</h1>';
                        echo '<a href="prodotto.php?ISBN='.$array['ISBN'].'&flag=1"><img src="'.$array['PathFoto'].'"></a>';
                        echo '<button id="'.$array['ISBN'].'">PRENOTA</button>';
                    echo '</div>';
                }
            echo '</div>';
        }
    ?>
</body>
<script src="scripts/prenota.js"></script>
</html>