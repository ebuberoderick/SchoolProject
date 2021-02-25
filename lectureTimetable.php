<?php $child = 'lecture'; $page = 'Timetable'; include 'menu.php';  ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Lecture Timetable
    <?php
      if($_SESSION['userType'] == 'teacher'){
        $class=$_SESSION['formTeacher'];
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }elseif($_SESSION['userType'] == 'student'){
        $class=$_SESSION['class'];
        $time=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }elseif($_SESSION['userType'] == 'parent'){
        $time=mysqli_query($pcon,"SELECT * FROM parentinfo WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }else{
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }
    ?>
  </div>
</nav>
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:15px !important">
    <div class="table-responsive table_div">
        <table class="table table-bordered table-striped white" style="height:70vh">
            <tr><hr style="position:absolute;width:90px;transform:rotateZ(30deg);padding-bottom:100px;margin-left:-33px;">
                <th class="event"></th>
                <th>7:30am - 8:00am</th>
                <th>8:00am - 8:45am</th>
                <th>8:45am - 9:30am</th>
                <th>9:30am - 10:15am</th>
                <th>10:15am - 11:00am</th>
                <th>11:00am - 11:45am</th>
                <th>11:45am - 12:30pm</th>
                <th>12:30pm - 1:15pm</th>
                <th>1:15pm - 2:00pm</th>
                <th>2:00pm - 2:45pm</th>
                <th>2:45pm - 3:00pm</th>
            </tr>
            <?php
                $day=['monday'];
                $time=['7:30am - 8:00am','8:00am - 8:45am','8:45am - 9:30am','9:30am - 10:15am','10:15am - 11:00am','11:00am - 11:45am','11:45am - 12:30pm','12:30pm - 1:15pm','1:15pm - 2:00pm','2:00pm - 2:45pm','2:45pm - 3:00pm'];
                $dayCount = 0;
                while ($dayCount < 1) {
                    $newDay=$day[$dayCount];
                    $dayCount++;
                    $timeCount=0;
                    ?>
                        <tr>
                            <th class="flow-text" style="text-transform: capitalize;"><?php echo $newDay ?></th>
                            <?php 
                                while ($timeCount <= 10) {
                                    $newTime=$time[$timeCount];
                                    $timeCount++;
                                    if($newDay=='monday' && $newTime=='7:30am - 8:00am'){
                                        echo '<td rowspan="5" style="padding:0px;"><div class="timeTableEvents"><span>devotion</span> </div></td>';
                                    }elseif($newDay=='monday' && $newTime=='11:00am - 11:45am'){
                                        echo '<td  rowspan="5" style="padding:0px;"><div class="timeTableEvents"><span>break</span> </div></td>';
                                    }elseif($newDay=='monday' && $newTime=='2:45pm - 3:00pm'){
                                        echo '<td rowspan="5" style="padding:0px;"><div class="timeTableEvents"><span>close</span> </div></td>';
                                    }else{
                                        ?>
                                            <td>
                                                <span><span style="font-weight:bold">Subject:</span><br>
                                                    <?php
                                                        $subj=subject($newTime,$newDay,$class,$pcon);
                                                        echo subject($newTime,$newDay,$class,$pcon);
                                                    ?>
                                                </span><br>
                                                <span><span style="font-weight:bold">Teacher:</span><br>
                                                    <?php
                                                        echo teacher($subj,$class,$pcon);
                                                    ?>
                                                </span>
                                            </td>
                                        <?php
                                    }           
                                }
                            ?>
                        </tr>
                    <?php
                }
            ?>
            <?php
                $day=['tuesday','wednesday','thursday','friday'];
                $time=['8:00am - 8:45am','8:45am - 9:30am','9:30am - 10:15am','11:00am - 11:45am','11:45am - 12:30pm','12:30pm - 1:15pm','1:15pm - 2:00pm','2:00pm - 2:45pm'];
                $dayCount = 0;
                while ($dayCount <= 3) {
                    $newDay=$day[$dayCount];
                    $dayCount++;
                    $timeCount=0;
                    ?>
                        <tr>
                            <th class="flow-text" style="text-transform: capitalize;"><?php echo $newDay ?></th>
                            <?php 
                                while ($timeCount <= 7) {
                                    $newTime=$time[$timeCount];
                                    $timeCount++;
                                    ?>
                                        <td>
                                            <span><span style="font-weight:bold">Subject:</span><br>
                                                <?php
                                                    $subj=subject($newTime,$newDay,$class,$pcon);
                                                    echo subject($newTime,$newDay,$class,$pcon);
                                                ?>
                                            </span><br>
                                            <span><span style="font-weight:bold">Teacher:</span><br>
                                                <?php
                                                    echo teacher($subj,$class,$pcon);
                                                ?>
                                            </span>
                                        </td>
                                    <?php
                                }
                            ?>
                        </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>
<?php
    function subject($newTime,$newDay,$class=null,$pcon){
        $dence= mysqli_query($pcon,"SELECT * FROM lectuertimetable WHERE dayTime='$newTime' AND weekDay='$newDay' AND classLevel='$class'");
        $nunows=mysqli_num_rows($dence);
        if($nunows > 0){
            $subject=mysqli_fetch_array($dence);
            return $subject[4];
        }else{
            return '<i class="material-icons text-2 red-text mt-2">radio_button_checked</i>';
        }
    }
    function teacher($subj,$class,$pcon){
        $dence= mysqli_query($pcon,"SELECT * FROM subjectlist WHERE subjects='$subj' AND class='$class'");
        $nunows=mysqli_num_rows($dence);
        if($nunows > 0){
            $subject=mysqli_fetch_array($dence);
            if($subject[2]=='null'){
                return 'No Teacher Asigned For This Subject Yet';
            }else{ 
                return $subject[2];
            }
        }else{
            return '<i class="material-icons text-2 red-text mt-2">radio_button_checked</i>';
        }
    }
?>