<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/> 
    <title>Prenotazioni</title>
    <?php session_start(); ?>
</head>
<header> <?php include("header.php"); ?> </header>
<body>
    <?php
        include("conn.php");
        $sql = 'SELECT  Titolo, AnnoPubblicazione, PathFoto, tAutore.Nome, tAutore.Cognome FROM tProdotto 
        INNER JOIN tAutore ON tProdotto.Autore = tAutore.id 
        WHERE ISBN = "'.$_GET['ISBN'].'"';
        
        $rec = mysqli_query($conn,$sql);
        $array = mysqli_fetch_array($rec);

        echo '<div id="prodotto">';
            echo '<div id="imgProdotto">';
                echo '<img src="'.$array['PathFoto'].'">';
            echo '</div>';

            echo '<div id="descrizioneLibro">';
                echo '<h1 id="titoloLibro">'.$array['Titolo'].'</h1>';
                echo '<p id="dettagliLibro">';
                    echo 'Autore: '.$array['Nome'].' '.$array['Cognome'].'<br>';
                    echo 'Anno di Pubblicazione: '.$array['AnnoPubblicazione'].'<br>';
                echo '</p>';
        echo '</div>';





    ?>
</body>
</html>