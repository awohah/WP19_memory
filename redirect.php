<?php
    session_start();
    if(isset($_GET['user_login'])){
        $user = $_GET['user_login'];
        $_SESSION['user'] = $user;
        header('Location: play.php');
        die();
    };