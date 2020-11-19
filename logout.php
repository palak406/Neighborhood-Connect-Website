<?php
session_start();
session_unset();
session_destroy();
$db = mysqli_connect('localhost', 'root', '', 'project 1');
$sql_3 = "UPDATE login_logs SET logout_time = current_timestamp where username =$_SESSION['username']";
$results3 = mysqli_query($db, $sql_3);
header("location:login.php");
exit();
?>