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
        echo '<div id="greeting">';
        echo '<h1>Welcome '.$_SESSION['user'].'!</h1>';
        echo '<h3>Say hello to your friends and play ofcourse :)</h3>';
        echo'</div>';
    };
?>
<div><a class="memory" id="playmemory" href="2_users.php?user=<?php echo $_SESSION['user']?>">Play memory!</a></div>

<?php
    if (isset($_GET['game'])) {
        echo"<div class='full'> Games are full!</div>";
    }
?>

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
    <form method="POST">
        <input type="hidden" name="name" value="<?php echo $_SESSION['user']?>">
        <textarea rows="4" cols="50" id="message"  name="message" placeholder="Type a message" required></textarea>
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
    array_push($new_message, [
        'user' => $_SESSION['user'],
        'text' => $_POST['message'],
        'time' => date("g:i:s A")
    ]);
// Save to external file
    $json_file = fopen('data/chat.json', 'w');
    fwrite($json_file, json_encode($new_message));
    fclose($json_file);
}
?>
