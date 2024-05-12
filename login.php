<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/> 
    <title>Login</title>
    <?php session_start(); ?>
</head>
<header> <?php include("header.php"); ?> </header>
<body>
    <form id="form" class="submit">
        <h1> LOG IN </h1>

        <h4>Email:</h4>
        <input id="email" type="text">
        <h4>Password:</h4>
        <input id="password" type="password">

        <input type="submit" value="Log in">

        <div class="centered">
            <h4> Non hai un account? <a href="./registration.php">Registrati</a> </h4> 
            <h4 style="font-weight: bolder; font-style: italic;" id="failed"></h4>
        </div>
    </form>
</body>
<script src="scripts/login.js"></script>
</html>