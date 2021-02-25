<?php
include_once 'DBconnect.php';
$msg=$_GET['msg'];
$sender=$_GET['sender'];
$reci=$_GET['reci'];
$sent=$ocon->query("INSERT INTO messages(msg,msgFrom,msgTo)VALUES('$msg','$sender','$reci')");
if($sent){
    echo 'done';
}
?>