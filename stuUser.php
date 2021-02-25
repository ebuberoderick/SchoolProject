<?php
include_once 'DBconnect.php';
$stuUser=$_GET['stuUser'];
$numberuser= mysqli_query($pcon,"SELECT * FROM logindb WHERE username='$stuUser'");
$numberuserExist = mysqli_num_rows($numberuser);
if($numberuserExist > 0){
    echo 'exist';
}else{
    echo 'dont';
}
?>