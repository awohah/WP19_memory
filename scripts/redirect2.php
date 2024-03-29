<?php
session_start();
if(empty($_SESSION['user'])){
    header('location: ../index.php');
}else{
    echo '<h1>Have fun playing, '.$_SESSION['user'].'!</h1>';

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Memory</title>
    <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


</head>
<body id="background">
<div class="container mt-4">
    <div id="scores"></div>
    <div id="game_board"></div>
</div>
<script type="application/javascript" src="memory.js"></script>
</body>
</html>