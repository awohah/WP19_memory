<?php
    session_start();
    if(empty($_SESSION['user'])){
        header('location: index.php');
    }else{
        echo '<a class="back" href="play.php">Back</a>';
        echo '<a class="signout" href="logout.php">Sign out</a>';
        include __DIR__ . '/html/memory.html';
    };