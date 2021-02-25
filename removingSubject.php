<?php 
include_once 'DBconnect.php';
$iv = $_POST['subjectName'];
$check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE subjects='$iv'");
$nrow=mysqli_num_rows($check);
if($nrow <= 0){
    echo 'Does Not Exist ';
}else{
    $query = $ocon->query("DELETE FROM subjectlist WHERE subjects='$iv'");
    if($query) {
        echo 'success';
    }else{
        echo 'failed';
    }
}
?>