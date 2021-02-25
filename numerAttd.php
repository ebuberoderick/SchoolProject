<?php 
session_start();
include_once 'DBconnect.php';
$fullName=$_SESSION['full'];
$numCount = $_GET['fri'];
$numberschoolweek= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
$numWeek = mysqli_fetch_array($numberschoolweek);
$academicTerm=$numWeek['academicTerm'];
$academicSection=$numWeek['academicSection'];
$query2= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$numCount' AND academicTerm='$academicTerm' AND studentFullName='$fullName' AND academicSection='$academicSection'");
$nrows2=mysqli_num_rows($query2);
echo $nrows2;
?>		