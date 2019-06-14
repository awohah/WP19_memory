<?php
//destroys session of a user
session_start();
session_destroy();
header("location: ../index.php");
exit();
