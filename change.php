<?php
include_once 'DBconnect.php';
$teacher=$_GET['newteacher'];
$subject=$_GET['subject1'];
$class=$_GET['class1'];
$exec_query = mysqli_query($pcon,"UPDATE subjectlist SET teacher='$teacher' WHERE subjects='$subject' AND class='$class'");
if($exec_query){
    echo 'done';
}
?>