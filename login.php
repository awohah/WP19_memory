<?php
if (isset($_POST['submit'])) {

    $json_file = file_get_contents("data/data.json");
    $users = json_decode($json_file, true);


    header("Location: index.php?user_login='invalid'");

    foreach ($users as $key => $value){
        if ($value['user_name'] == $_POST['user'] && $value['password']== $_POST['password']){
            // Redirect to other page
            header("Location: redirect.php?user_login=".$value['user_name']."");
            die();
        }
    }
}
