<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <title>Sign-up</title>

    <link rel="stylesheet" type="text/css" href="css/signin-up.css">
</head>

<body id="signup-body">

<div id="wrapper">
    <div id="container">

        <form method="POST">

            <div class="signup-logo"></div>
            <div class="signup-title">Sign up</div>

            <div class="form-group">
                <input type="text" id="user" name="user" placeholder="Username" required>
                <div class="valid" style="display: none;">Nice!</div>
                <div class="invalid" style="display: none;">Please fill in your username!</div>
            </div>

            <div class="form-group">
                <input type="password"  id="password" name="password" placeholder="Password" required>
                <div class="valid" style="display: none;">Check!</div>
                <div class="invalid" style="display: none;">Please fill in another password!</div>
            </div>

            <div class="form-group">
                <input type="password" id="confirmation" name="confirmation" placeholder="Confirm your password" required>
            </div>

            <?php
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
                ?>
            <button type="submit" name="submit">Sign up</button>

            <div class="login">
                <a href="index.php">Log in?</a>
            </div>

        </form>

    </div>

</div>

</body>
<script type="text/javascript" src="data/data.json"></script>
</html>

<?php
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
