<body id="login-body">

<div id="wrapper">

    <div id="container">

        <form action="../scripts/login.php" method="POST">

            <div class="login-logo"></div>
            <div class="login-title">Login</div>

            <div class="form-group">
                <input type="text"class="form-control input" id="user" name="user" placeholder="Username" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control input" id="password" name="password" placeholder="Password" required>
            </div>

            <button id="sub" type="submit" name="submit">Log in</button>

            <div class="signup">
                <a href="../scripts/signup.php">Sign up?</a>
            </div>