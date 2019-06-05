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