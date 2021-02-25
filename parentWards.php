<?php
session_start();
include_once 'DBconnect.php';
$user=$_SESSION['username'];
$usermail= mysqli_query($pcon,"SELECT * FROM parentinfo WHERE username='$user'");
$userWard=mysqli_fetch_array($usermail);
echo $userWard[8];
// "SELECT * FROM Orders LIMIT 1 OFFSET 15";
$usermail= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE username='$user'");
?>