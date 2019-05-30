<?php
    session_start();
    if(empty($_SESSION['user'])){
        header('location: index.php');
    }else{
        echo '<a id="signout" href="index.php">Sign out</input></a>';
        echo '<h1>Welcome '.$_SESSION['user'].'</h1>';
        include __DIR__ . '/html/memory.html';
    };