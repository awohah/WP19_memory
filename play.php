<!DOCTYPE html>
<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <script src="http://mysite.com/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/play.js"></script>
</head>
<body>
<?php
    session_start();
    if(empty($_SESSION['user'])){
        header('location: index.php');
    }else{
        echo '<a id="signout" href="logout.php">Sign out</a>';
        echo '<h1>Welcome '.$_SESSION['user'].'</h1>';
    };
?>
<button id="play">Play memory</button>
</body>
</html>

