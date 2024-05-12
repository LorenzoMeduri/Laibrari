<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/> 
    <title>Registrazione</title>
    <?php session_start(); ?>
</head>
<header> <?php include("header.php"); ?> </header>
<body>
    <form id="form" class="submit">
        <h1> REGISTRAZIONE </h1>

        <h4>Nome:</h4>
        <input type="text" id="nome">
        <h4>Cognome:</h4>
        <input type="text" id="cognome">
        <h4>Email:</h4>
        <input type="text" id="email">
        <h4>Password:</h4>
        <input type="password" id="password">
        <h4>Codice Fiscale:</h4>
        <input type="text" id="codiceFiscale">
        <h4>N. Telefono:</h4>
        <input type="text" maxlength="10" pattern="[0-9]" id="nTelefono">

        <input type="submit" value="Registrati">

        <div class="centered">
            <br>
            <h4 style="font-weight: bolder; font-style: italic;" id="failed"></h4>
        </div>
    </form>
</body>
<script src="scripts/registration.js"></script>
</html>