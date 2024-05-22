<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/> 
    <title>Richieste</title>
    <?php session_start(); ?>
</head>
<header> <?php include("header.php"); ?> </header>
<body>
    <?php
        if($_SESSION['auth'] == 0){
            echo '<script>';
                echo 'alert("Devi essere loggato per avere delle prenotazioni");';
                echo "window.location.replace(window.location.href.split('/').slice(0, -1).join('/') + '/' + 'login.php');";
            echo '</script>';
        }

        include("conn.php");

        $sql = 'SELECT Nome, Cognome, ISBN, Titolo, PathFoto, idAccettazione, idRestituzione
        FROM(
            SELECT ROW_NUMBER() OVER (PARTITION BY tProdotto.ISBN ORDER BY tRichiesta.id DESC) AS NRiga, tRichiesta.id, tCliente.Nome, tCliente.Cognome, tProdotto.ISBN, tProdotto.PathFoto, tProdotto.Titolo, tAccettazione.id AS idAccettazione, tRestituzione.id AS idRestituzione
                FROM tRichiesta 
                LEFT OUTER JOIN tProdotto ON tProdotto.ISBN = tRichiesta.Prodotto
                LEFT OUTER JOIN tAccettazione ON tRichiesta.id = tAccettazione.Richiesta
                LEFT OUTER JOIN tRestituzione ON tAccettazione.id = tRestituzione.Accettazione
                INNER JOIN tCliente ON tRichiesta.Cliente = tCliente.CodiceFiscale
            ) AS tabellona
            WHERE NRiga = 1 AND idRestituzione IS NULL';

        $rec = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($rec);

        if($num == 0){
            echo '<h1 id="libriNonDisponibili"> NESSUNA PRENOTAZIONE</h1>';
        }else{
            echo '<div id="elenco">';
                while($array = mysqli_fetch_array($rec)){
                    echo '<div id="product-box">';
                        echo '<h1 id="titolo">'.$array['Titolo'].'<br> <div id="infoPrenotante">Prenotato da '.$array['Nome'].' '.$array['Cognome'].'</div></h1>';
                        echo '';
                        echo '<a href="prodotto.php?ISBN='.$array['ISBN'].'&flag=0"><img src="'.$array['PathFoto'].'"></a>';
                        if($array['idAccettazione'] == NULL)
                            echo '<button id="'.$array['ISBN'].'">ACCETTA</button>';
                        else if($array['idAccettazione'] != NULL && $array['idRestituzione'] == NULL)
                            echo '<button id="'.$array['ISBN'].'">RESTITUISCI</button>';
                    echo '</div>';
                }
            echo '</div>';
        }
    ?>
</body>
<script src="script/richieste.js"></script>
</html>