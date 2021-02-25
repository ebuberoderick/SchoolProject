<?php 
session_start();
include_once 'DBconnect.php';
$numberschoolweek= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
$numWeek = mysqli_fetch_array($numberschoolweek);
$week=$numWeek['week'];
$academicTerm=$numWeek['academicTerm'];
$academicSection=$numWeek['academicSection'];
$currDay=$numWeek['currDay'];
$class=$_SESSION['formTeacher'];
$query= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE studentCurrentClass='$class'");
$nrows=mysqli_num_rows($query);
$query2= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentClass='$class' AND currDay='$week' AND week='$currDay' AND academicTerm='$academicTerm' AND academicSection='$academicSection'");
$nrows2=mysqli_num_rows($query2);
echo $nrows-$nrows2;
?>  