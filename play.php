<!DOCTYPE html>
<html>

<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <script src="http://mysite.com/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/play.js"></script>
</head>
<body id="play_background">
<?php
    session_start();
    if(empty($_SESSION['user'])){
        header('location: index.php');
    }else{
        echo '<a class="signout" href="logout.php">Sign out</a>';
        echo '<h1>Welcome '.$_SESSION['user'].'</h1>';
    };
?>
<button id="play">Play memory</button>

<div id="chat-container">
    <div id="chat">
        <div id="chat-box">
            <div id="chat-data">
                <script>
                    setInterval(function(){
                        $.ajax({
                            type: "GET",
                            url: 'chat.php',
                            success: function(data){
                                $('#chat-box').html(data);

                            }
                        });
                    },100);
                </script>

            </div>
        </div>
    </div>

    <body id="scroller">
    <div id="anchor"></div>
    </body>
    <form id="chat" method="POST">
        <input type="hidden" name="name" value="<?php echo $_SESSION['user']?>">
        <textarea id="message" name="message" placeholder="Enter message" required></textarea>
        <input id="submit-text" type="submit" name="submit" value="send">

    </form>
</div>

</body>
</html>
<?php

if (isset($_POST['submit'])) {
// get json data with user details
    $json_file = file_get_contents("data/chat.json");
    $new_message = json_decode($json_file, true);
    $new_message = array_reverse($new_message);
    array_push($new_message, [
        'user' => $_SESSION['user'],
        'text' => $_POST['message'],
        'time' => date("h:i:sa")
    ]);
// Save to external file
    $json_file = fopen('data/chat.json', 'w');
    fwrite($json_file, json_encode($new_message));
    fclose($json_file);
}
?>
