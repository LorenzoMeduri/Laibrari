<?php
    session_start();
    if($_SESSION['auth'] == 1)
        echo 1;

    $_SESSION['auth'] = 0;
?>