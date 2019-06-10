<?php
session_start();
if(empty($_SESSION['user'])){
    header('location: index.php');
}else{
    // GET VALUE: echo '<h1>ID = '.$_GET['id'].'</h1>';
    echo '<h1>Have fun playing '.$_SESSION['user'].'!</h1>';
    echo '<a class="back" href="play.php">Back</a>';
    echo '<a class="signout" href="logout.php">Sign out</a>';
    include __DIR__ . '/html/memory.html';
};