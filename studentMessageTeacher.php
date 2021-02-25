<?php
    session_start();
    $from=$_SESSION['studentCurrentClass'];
    $myclas=$_SESSION['username'];
    
?>
<ul class="collection with-header z-depth-2" style="margin:0px;">
    <?php
    include_once 'DBconnect.php';
        $getWards=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE emergencymail='$myclas'");
        while($wardsClass=mysqli_fetch_array($getWards)){
            $clas=$wardsClass['studentCurrentClass'];
            $getStudent=mysqli_query($pcon,"SELECT * FROM teacher WHERE formTeacher='$clas' || 'admin' || 'princepal'");
            while($checkstudent=mysqli_fetch_array($getStudent)){
                $fullName = $checkstudent[6].' '.$checkstudent[4].' '.$checkstudent[5];
                ?>
                    <form action="MsgBox.php" method="get" style="margin:0px;padding:0px;">
                            <button type="submit" name="mail" value="<?php echo $checkstudent[3]?>" ></button>
                    </form>
                    <li class="collection-item avatar" style="padding-bottom:0px;max-height:1px !important">
                        <img src="/teacherImage/<?php echo $checkstudent[9]?>" class="circle mt-2 showpic" alt="Profile image">
                        <span class="title"><?php echo $fullName?></span>
                        <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                        <p class="grey-text truncate">Active: 2 day ago</p>
                        <a href="" class="secondary-content">
                            <i class="badge teal white-text">17</i>
                        </a>
                    </li>
                <?php
            }
        }
        
    ?>
</ul>
<script>
    $('.showpic').materialbox({});
</script>
