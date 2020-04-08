<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["logged_in"]);
unset($_SESSION["fullname"]);
header("location:..\login.php");
?>