<?php
    session_start();
    $log = "Login.php";
    unset($_SESSION['profile']);
    session_destroy($_SESSION['profile']);
	header("location: {$log}");
 ?>