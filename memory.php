<?php
    session_start();
    if(empty($_SESSION['user'])){
        header('location: index.php');
    }else{
        echo '<a id="back" href="play.php">Back <br></input></a>';
        echo '<a id="signout" href="index.php">Sign out</a>';
        echo '<h1>Welcome '.$_SESSION['user'].'</h1>';
        include __DIR__ . '/html/memory.html';
    };