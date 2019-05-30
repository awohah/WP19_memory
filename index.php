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

        <form action="login.php" method="POST">

            <div class="login-logo"></div>
            <div class="login-title">Login</div>

            <div class="form-group">
                <input type="text" id="user" name="user" placeholder="Username" required>
            </div>

            <div class="form-group">
                <input type="password"  id="password" name="password" placeholder="Password" required>
            </div>

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