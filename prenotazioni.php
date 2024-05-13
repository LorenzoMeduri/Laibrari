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
        if($_SESSION['auth'] == 0){
            echo '<script>';
                echo 'alert("Devi essere loggato per avere delle prenotazioni");';
                echo "window.location.replace(window.location.href.split('/').slice(0, -1).join('/') + '/' + 'login.php');";
            echo '</script>';
        }

        include("conn.php");
        $sql = 'SELECT DISTINCT tProdotto.ISBN, tProdotto.Titolo, tProdotto.PathFoto, tAccettazione.id FROM tRichiesta 
        INNER JOIN tProdotto ON tRichiesta.Prodotto = tProdotto.ISBN
        LEFT JOIN tAccettazione ON tRichiesta.id = tAccettazione.Richiesta 
        WHERE tRichiesta.Cliente = "'.$_SESSION['auth'].'";';

        $rec = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($rec);

        if($num == 0){
            echo '<h1 id="libriNonDisponibili"> NESSUNA PRENOTAZIONE</h1>';
        }else{
            echo '<div id="elenco">';
                while($array = mysqli_fetch_array($rec)){
                    echo '<div id="product-box">';
                        echo '<h1 id="titolo">'.$array['Titolo'].'</h1>';
                        echo '<a href="prodotto.php?ISBN='.$array['ISBN'].'&flag=0"><img src="'.$array['PathFoto'].'"></a>';
                        if($array['id'] == NULL)
                            echo '<button id="'.$array['ISBN'].'">ELIMINA</button>';
                        else
                            echo '<button id="'.$array['ISBN'].'" style="background-color: grey;" disabled>RICHIESTA ACCETTATA</button>';
                    echo '</div>';
                }
            echo '</div>';
        }
    ?>
</body>
<script src="scripts/eliminaPrenotazione.js"></script>
</html>