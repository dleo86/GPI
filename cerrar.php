<?php
session_start();
session_destroy();
$_SESSION = array();
header('Location: menu_login.php');
die();
?>
