<ul class="collection with-header z-depth-2" style="margin:0px;">
    <?php
        session_start();
        include_once 'DBconnect.php';
        $from=$_SESSION['formTeacher'];
        $getStudent=mysqli_query($pcon,"SELECT * FROM studentinfo  WHERE studentCurrentClass='$from'");
        while($checkstudent=mysqli_fetch_array($getStudent)){
            $mail = $checkstudent[20];
            $getParent=mysqli_query($pcon,"SELECT * FROM parentinfo WHERE maillAddress='$mail'");
            while($checkParent=mysqli_fetch_array($getParent)){
                $fullName = $checkParent[3].' '.$checkParent[4].' '.$checkParent[5];
                ?>
                    <form action="MsgBox.php" method="get" style="margin:0px;padding:0px;">
                            <button type="submit" name="mail" value="<?php echo $checkParent['maillAddress']?>" ></button>
                    </form>
                    <li class="collection-item avatar" style="padding-bottom:0px;max-height:1px !important">
                        <img src="/parentImage/<?php echo $checkParent[10]?>" class="circle mt-2 showpic" alt="Profile image">
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
