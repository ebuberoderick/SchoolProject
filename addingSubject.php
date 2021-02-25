<?php 
include_once 'DBconnect.php';
$iiv = $_POST['subjectName'];
$check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE subjects='$iiv'");
$nrow=mysqli_num_rows($check);
if($nrow <= 0){
    $query = $ocon->query("INSERT INTO subjectlist(subjects) VALUES ('$iiv')");
    if($query) {
        echo 'success';
    }
}else{
    echo 'Already Exist ';
}
?>