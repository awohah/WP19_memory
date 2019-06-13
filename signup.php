<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <title>Sign-up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signin-up.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>
    <script type="text/javascript" src="data/data.json"></script>


</head>

<body id="signup-body">

<div id="wrapper">
    <div id="container">

        <form method="POST">

            <div class="signup-logo"></div>
            <div class="signup-title">Sign up</div>

            <div class="form-group">
                <label for="user"></label>
                <input type="text" class="form-control input" id="user" name="user" placeholder="Username">
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Username can only include letters, numbers, periods and underscores.</div>
            </div>

            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control input" id="password" name="password" placeholder="Password">
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Password must be between 4 and 8 digits long and include at least one numeric digit.</div>
            </div>

            <div class="form-group">
                <input type="password" class="form-control input" id="confirmation" name="confirmation" placeholder="Confirm your password" required>
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
            <button class="submit" id="submit" type="submit" name="submit">Sign up</button>

            <div class="login">
                <a href="index.php">Log in?</a>
            </div>

        </form>


    </div>
</div>

</body>
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
