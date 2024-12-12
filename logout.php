<?php
    session_start();

    //if user log in, unset the session
    if(isset($_SESSION['USER'])) {
        unset($_SESSION['USER']);
    }
    session_destroy();

    header('Location: login.php');
    exit;
?>