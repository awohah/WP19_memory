<!DOCTYPE html>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css/signin-up.css">

</head>

<body id="login-body">

<div id="wrapper">

    <div id="container">

        <form method="POST">

            <div class="login-logo"></div>
            <div class="login-title">Login</div>

            <div class="form-group">
                <input type="text" id="user" name="user" placeholder="Username" required>
            </div>

            <div class="form-group">
                <input type="password"  id="password" name="password" placeholder="Password" required>
            </div>
            <?php
                if (isset($_POST['submit'])) {

                    $json_file = file_get_contents("data/data.json");
                    $users = json_decode($json_file, true);


                    foreach ($users as $key => $value){
                        if ($value['user_name'] == $_POST['user'] && $value['password']== $_POST['password']){
                            // Redirect to other page
                            header("Location: redirect.php?user_login=".$value['user_name']."");
                            die();
                        }

                    } echo"<div id='signin-fail'>Username or password incorrect</div>";
                }?>

            <button type="submit" name="submit">Log in</button>

            <div class="signup">
                <a href="signup.php">Sign up?</a>
            </div>

        </form>

    </div>

</div>

</body>

<script type="text/javascript" src="data/data.json"></script>

</html>

