<?php 
session_start();
include_once 'DBconnect.php';
$numberschoolweek= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
$numWeek = mysqli_fetch_array($numberschoolweek);
$week=$numWeek['currDay'];
$run=0;
while($run<$week){++$run;?>w<?php }
?>