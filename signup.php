
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <title>Sign-up</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/signin-up.css">
    <script type="text/javascript" src="data/data.json"></script>
    <script type="text/javascript" src="js/validation.js"></script>


</head>

<body id="signup-body">


<div id="wrapper">
    <div id="container">
        <div id="usr" class="alert alert-danger" role="alert">
            Please enter a correct username!
        </div>

        <div id="pw" class="alert alert-danger" role="alert">
            Please enter a valid password!
        </div>


        <form>
            <div class="signup-logo"></div>
            <div class="signup-title">Sign up</div>

            <div class="form-group">
                <label for="user"></label>
                <input type="text" class="form-control input" id="user" name="user" placeholder="Username">
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Username must contain at least one letter, at least one number, and be longer than six characters.
                </div>
            </div>

            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control input" id="password" name="password" placeholder="Password">
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Password must be between 4 and 8 digits long and include at least one numeric digit.
                </div>
            </div>

            <div class="form-group">
                <input type="password"  class="form-control input" id="confirmation" name="confirmation" placeholder="Confirm your password" required>

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


            <div class="form-group">
                <div id="sub" class="btn btn-primary btn-lg button"> Sign up!</div>
                <button id="button" name="submit"  type="submit" class="btn btn-primary btn-lg button">button</button>
            </div>

        </form>
    </div>

    <div class="login">
        <a href="index.php">Log in?</a>
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

