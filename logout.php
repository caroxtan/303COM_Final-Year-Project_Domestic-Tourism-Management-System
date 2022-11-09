<?php
session_start();

unset($_SESSION["username"]);
session_destroy();
$url = "login.php";

header("Location:$url");

?>