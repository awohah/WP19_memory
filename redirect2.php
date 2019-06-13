<?php
session_start();
if(empty($_SESSION['user'])){
    header('location: index.php');
}else{
    echo '<h1>Have fun playing '.$_SESSION['user'].'!</h1>';


    include __DIR__ . '/html/memory.html';


};