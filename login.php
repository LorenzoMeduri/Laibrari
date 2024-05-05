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
<script>
    document.getElementById("form").addEventListener('submit', auth);

    function auth(e){
        e.preventDefault();
        var parameters = "email=" + document.getElementById("email").value + "&password=" + document.getElementById("password").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api/auth.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            if(this.responseText == 1){
                window.location.replace(window.location.href.split('/').slice(0, -1).join('/') + '/' + "index.php");
            }
            else{
                document.getElementById("failed").innerHTML = "Credenziali errate";
                document.getElementById("password").value = "";
            }
        }

        xhr.send(parameters);
    }
</script>
</html>