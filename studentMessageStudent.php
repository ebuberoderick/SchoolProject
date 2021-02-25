<ul class="collection with-header z-depth-2" style="margin:0px;">
    <?php
    session_start();
    $from=$_SESSION['studentCurrentClass'];
    $myclas=$_SESSION['username'];
    include_once 'DBconnect.php';
        $getStudent=mysqli_query($pcon,"SELECT * FROM studentinfo  WHERE studentCurrentClass='$from' AND username!='$myclas'");
        while($checkstudent=mysqli_fetch_array($getStudent)){
            $fullName = $checkstudent[1].' '.$checkstudent[2].' '.$checkstudent[3];
            ?>
                <form action="MsgBox.php" method="get" style="margin:0px;padding:0px;">
                        <button type="submit" name="mail" value="<?php echo $checkstudent[8]?>" ></button>
                </form>
                <li class="collection-item avatar" style="padding-bottom:0px;max-height:1px !important">
                    <img src="/studentImage/<?php echo $checkstudent[4]?>" class="circle mt-2 showpic" alt="Profile image">
                    <span class="title"><?php echo $fullName?></span>
                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                    <p class="grey-text truncate">Active: 2 day ago</p>
                    <a href="" class="secondary-content">
                        <i class="badge teal white-text">17</i>
                    </a>
                </li>
            <?php
        }
    ?>
</ul>
<script>
    $('.showpic').materialbox({});
</script>
