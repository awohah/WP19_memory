<?php
include __DIR__ . '/tpl/head.php';
?>
<title>Login</title>
<?php
include __DIR__ . '/tpl/body.php';
if (isset($_GET['user_login'])) {
    echo"<div id='signin-fail'>Username or password incorrect</div>";
}
include __DIR__ . '/tpl/footer.php';
?>
</html>

