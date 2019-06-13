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
