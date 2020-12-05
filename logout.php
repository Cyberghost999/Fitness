<?php
session_start();
$_SESSION['login_status']=false;
unset($_SESSION['email']);
header("Location: index1.php");
?>