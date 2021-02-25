<?php 
session_start();
include_once 'DBconnect.php';
$i = 'checked';
$iv = 'admin';
$ii = '';
$checkVal=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$iv'");
$nrow=mysqli_num_rows($checkVal);
if($nrow > 0){
    $chd=mysqli_fetch_assoc($checkVal);
    $dV=$chd['showTime'];
    echo $dV;
    if($dV == 'checked'){
        $go ="UPDATE teacher SET showTime='$ii' WHERE username='$iv'";
        $query = $ocon->query($go);
    }else{
        $go ="UPDATE teacher SET showTime='$i' WHERE username='$iv'";
        $query = $ocon->query($go);
    }
}else{
    
}
?>