<?php
    include_once 'DBconnect.php';
    $sender=$_GET['sender'];
    $reci=$_GET['reci'];
    $chekMess=mysqli_query($pcon,"SELECT * FROM logindb WHERE email='$reci'");
    $chekMessType=mysqli_fetch_array($chekMess);
    if($chekMessType['userType']=='student'){
        $getStudent=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE contactMail='$reci'");
        $checkstudent=mysqli_fetch_array($getStudent);
        $fullName = $checkstudent[1].' '.$checkstudent[2].' '.$checkstudent[3];
    }elseif ($chekMessType['userType']=='parent'){
        $getStudent=mysqli_query($pcon,"SELECT * FROM parentinfo WHERE maillAddress='$reci'");
        $checkstudent=mysqli_fetch_array($getStudent);
        $fullName = $checkstudent[3].' '.$checkstudent[4].' '.$checkstudent[5];
    }else{
        $getStudent=mysqli_query($pcon,"SELECT * FROM teacher WHERE email='$reci'");
        $checkstudent=mysqli_fetch_array($getStudent);
        $fullName = $checkstudent[6].' '.$checkstudent[4].' '.$checkstudent[5];
    };
    $msgs=mysqli_query($pcon,"SELECT * FROM messages WHERE ( msgTo='$reci' OR msgFrom='$reci')AND( msgTo='$sender' OR msgFrom='$sender')");
    $nummsgs=mysqli_num_rows($msgs);
    if($nummsgs > 0){
        while ($msgShare = mysqli_fetch_array($msgs)){
            $chkPositio=$msgShare[1];
            if($chkPositio == $reci){
                ?>
                    <div class="mt-2" style="position:relative;align:right" align="right">
                        <div style="display:table;margin-left:30%">
                            <span class="teal">
                                <p class="teal z-depth-3 lighten-3 pl-4 pr-4 pt-2 pb-2 ml-1 mb-0" style="border-radius:9px 9px 0px 9px;">
                                    <?php echo $msgShare[3]; ?>
                                </p>
                            </span>
                        </div>
                        <span class="grey-text ml-4 mt-1">
                            <?php $ti=$msgShare[4]; $ime= new DateTime($ti); echo $ime->format('h:i a'); ?>
                        </span>
                    </div> 
                <?php
            }else{
                ?>
                    <div class="mt-2">
                        <div style="display:flex;">
                            <?php
                                if($chekMessType['userType']=='student'){
                                    ?>
                                        <img  src="/studentImage/<?php echo $checkstudent[4]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="width:15px;height:15px;align-self:end;margin-bottom:-19px" alt="Profile image">
                                    <?php
                                }elseif ($chekMessType['userType']=='parent'){
                                    ?>
                                        <img  src="/parentImage/<?php echo $checkstudent[10]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="width:15px;height:15px;align-self:end;margin-bottom:-19px" alt="Profile image">
                                    <?php
                                }else{
                                    ?>
                                        <img  src="/teacherImage/<?php echo $checkstudent[9]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="width:15px;height:15px;align-self:end;margin-bottom:-19px" alt="Profile image">
                                    <?php
                                }
                            ?>
                            <p class="grey z-depth-3 lighten-3 pl-4 pr-4 pt-2 pb-2 ml-1 mb-0" style="border-radius:9px 9px 9px 0px;margin-right:30%"> <?php echo $msgShare[3]; ?></p>
                        </div>
                        <span class="grey-text ml-4 mt-1">
                            <?php $ti=$msgShare[4]; $ime= new DateTime($ti); echo $ime->format('h:i a'); ?>
                        </span>
                    </div>
                <?php
            }
        }
    }else{
        ?>
            <div class="center grey-text flow-text mt-5">Start Conversation</div>
        <?php
    }
?>

