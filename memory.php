<?php
    session_start();
    if(empty($_SESSION['user'])){
        header('location: index.php');
    }else{
        echo '<a id="back" href="play.php">Back <br></input></a>';
        echo '<a id="signout" href="logout.php">Sign out</a>';
        include __DIR__ . '/html/memory.html';
    };