<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/> 
    <title>Home</title>
    <?php session_start(); ?>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0RLgPIM87iDhK6rJww_Wb6VuIMXnjS_U"></script>
</head>
<header> 
    <?php 
        if(!isset($_SESSION['auth']))
            $_SESSION['auth'] = 0;
        
        include("header.php"); 
    ?> 
</header>
<body>
    <?php
        echo '<br>';
        echo '<div id="mapDiv" style="height: 600px; width: 100%;"></div>';
    ?>
</body>
<script src="scripts/map.js"></script>
</html>