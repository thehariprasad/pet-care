<?php
session_start();
unset($_SESSION['username']);
$_SESSION['isLoggedin'] = false;
session_destroy();

header("Location: index.php");
exit;
?>