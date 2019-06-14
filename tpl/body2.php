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
