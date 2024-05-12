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
        $sql = 'SELECT  Titolo, AnnoPubblicazione, PathFoto, NPagine, Descrizione, tCasaEditrice.Nome AS NomeCasaEditrice, tAutore.Nome AS NomeAutore, tAutore.Cognome AS CognomeAutore FROM tProdotto 
        INNER JOIN tAutore ON tProdotto.Autore = tAutore.id
        INNER JOIN tCasaEditrice ON tProdotto.CasaEditrice = tCasaEditrice.id
        WHERE ISBN = "'.$_GET['ISBN'].'"';
        
        $rec = mysqli_query($conn,$sql);
        $array = mysqli_fetch_array($rec);

        echo '<div class="back-button">';
            echo '<a href="prodotti.php"><img class="back-button-img" src="img/back-arrow.png"></a>';
        echo '</div>';

        echo '<div id="prodotto">';
            echo '<div id="imgProdotto">';
                echo '<img src="'.$array['PathFoto'].'">';
            echo '</div>';

            echo '<div id="descrizioneLibro">';
                echo '<h1 id="titoloLibro">'.$array['Titolo'].'</h1>';
                echo '<p id="dettagliLibro">';
                    echo 'Autore: '.$array['NomeAutore'].' '.$array['CognomeAutore'].'<br>';
                    echo 'Anno di Pubblicazione: '.$array['AnnoPubblicazione'].'<br>';
                    echo 'Numero di Pagine: '.$array['NPagine'].'<br>';
                    echo 'Casa Editrice: '.$array['NomeCasaEditrice'].'<br>';
                    echo '<br>'.$array['Descrizione'].'<br>';
                echo '</p>';
        echo '</div>';
    ?>
</body>
</html>