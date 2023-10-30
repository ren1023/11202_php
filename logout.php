<?php

session_start();
echo "test";
unset($_SESSION['login']);
header("location:login.php");


?>