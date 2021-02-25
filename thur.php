<?php 
session_start();
include_once 'DBconnect.php';
$numberschoolweek= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
$numWeek = mysqli_fetch_array($numberschoolweek);
$currDay=$numWeek['currDay']-1;
$class=$_SESSION['formTeacher'];
$query2= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentClass='$class' AND currDay='thursday' AND week='$currDay'");
$nrows2=mysqli_num_rows($query2);
echo $nrows2;
?>