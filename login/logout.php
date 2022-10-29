<?php session_start(); ?>

<?php

$_SESSION['username'] = null;
$_SESSION['user_password'] = null;
$_SESSION['user_role'] = null;

session_start();

session_unset();

session_destroy();

header("Location: ../index.php");

?>