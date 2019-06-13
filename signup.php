<?php
include __DIR__ . '/tpl/head2.php'

$usernames = [];
if (isset($_POST['submit'])){
    $json_file = file_get_contents("data/data.json");
    $users = json_decode($json_file, true);

    foreach ($users as $key => $value){
        array_push($usernames, $value['user_name']);}
    if (in_array($_POST['user'], $usernames)) {
        echo "<div id='taken_username'>The username you entered is already taken</div>";
    }else{
        if ($_POST['password'] != $_POST['confirmation'])
        {echo "<div id='wrong-password'>Please make sure both password fields are the same!</div>";
        }
        else {echo"<div id='signup-success'>You've been signed up!</div>";
        }
    }
};

include __DIR__ . '/tpl/footer2.php'

if (isset($_POST['submit'])) {

// get json data with user details
    $json_file = file_get_contents("data/data.json");
    $new_user = json_decode($json_file, true);
    array_push($new_user, [
        'user_name' => $_POST['user'],
        'password' => $_POST['password']
    ]);
// Save to external file
    $json_file = fopen('data/data.json', 'w');
    fwrite($json_file, json_encode($new_user));
    fclose($json_file);
}
?>
