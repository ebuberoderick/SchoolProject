<?php 
include_once 'DBconnect.php';
$check=mysqli_query($pcon,"SELECT * FROM subject");
$nrow=mysqli_num_rows($check);
if($nrow > 0){?>
<ul>
    <p class="center flow-text" style="font-weight:bold;">Subject List</p>
    <?php while ($nrows = mysqli_fetch_array($check)){
        $use = $nrows['subjects'];?>
       <li style="font-size:19px;text-transform:capitailize"><i class="fa fa-genderless" style="position:relative;top:2px"></i> <?php echo $use; ?></li> <?php
    }?>
</ul>
<?php
}else{
    echo 'There Is No Subject Yet For This Class ';
}
?>