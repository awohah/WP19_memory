

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
            </div>

            <div class="form-group">
                <input type="password"  id="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <input type="password" id="confirmation" name="confirmation" placeholder="Confirm your password" required>
            </div>

            <?php
            if (isset($_POST['submit'])){
                if ($_POST['password'] != $_POST['confirmation'])
                {echo "<div is='wrong-password'>Please make sure both fields are the same!</div>";
                }
                else {echo"<div id='signup-success'>You've been signed up!</div>";
                }
            }
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
// Read articles
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
