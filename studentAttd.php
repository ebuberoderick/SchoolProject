<?php $child="StuddentAtt"; $page = 'Studentr'; include 'menu.php'; ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:9;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Ward(s) Attendence
    <?php
        if($_SESSION['userType'] == 'teacher'){
          $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
          $timeState=mysqli_fetch_assoc($time);
          $diV=$timeState['showTime'];
          if($diV == 'checked'){
              echo '<div class="timeStamp right"></div>';
          }
        }elseif($_SESSION['userType'] == 'student'){
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
<span class="btn-floating btn-large dnap waves-effect waves-indigo z-depth-4" style="position:fixed;bottom:15px;right:15px;"><i class="fa fa-dna"></i></span>
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:0px !important">
    <div class="m-2 row">
        <div class="col-md-3 p-2">
            <div class="flow-text">Table Key:</div>
            <div class="white mr-3 pl-2 z-depth-3" style="border-radius:9px">
                <span><i class="material-icons text-2 red-text mt-2">radio_button_checked</i><span style="position:relative;top:-7px;left:3px;padding-right:20px">: Absent</span></span>
                <span><i class="material-icons teal-text text-2 mt-2">done_all</i><span style="position:relative;top:-7px;left:3px">: Present</span></span><br>
                <span><i class="material-icons red-text-lighten-5 text-2 mt-2">highlight_off</i><span style="position:relative;top:-7px;left:3px">: Not a school day</span></span>
            </div>
        </div>
        <div class="stdAttTable table-responsive table_div p-0">
<table class="table table-bordered white table-striped" style="margin:0px;">
    <tr>
        <th rowspan="2" class="center pt-4">NO.</th>
        <th rowspan="2" class="center pt-4" style="width:1000px;padding:2px 45px">Wards Name</th>
        <?php
            $numberschoolweek= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
            $numWeek = mysqli_fetch_array($numberschoolweek);
            $term = $numWeek['academicTerm'];
            $section = $numWeek['academicSection'];
            $todayAtt = $numWeek['currDay'];
            $wekAtt = $numWeek['week'];
            $runweek=0;
            while ($runweek < $numWeek['studentClass']){
                ++$runweek;
                ?>
                    <th colspan="5" class="center">WEEK <?php echo $runweek; ?></th>
                <?php
            }
        ?>
    </tr>
    <tr>
    <?php
        $runDay=0;
        while ($runDay < $numWeek['studentClass']){
            ++$runDay;
            ?>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>TH</th>
                <th>F</th>
            <?php
        }
    ?>
    </tr>
    <?php 
        $mail = $_SESSION['mail'];;
        $getMyStudents= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE contactMail='$mail'");
        $nStds=mysqli_num_rows($getMyStudents);
        $run=0;
        if($nStds > 0){
            while ($student = mysqli_fetch_array($getMyStudents)){
                ++$run;
            ?>
                <tr>
                    <th><?php echo $run.'.' ?></th>
                    <td style="word-spacing: 9px;text-transform:capitalize">
                        <?php
                            $stdName = $student['surName'].' '.$student['firstName'].' '.$student['otherName'];
                            echo $stdName;
                        ?>
                    </td>
                    <?php
                        $runAtt=0;
                        while ($runAtt < $numWeek['studentClass']){
                            ++$runAtt;
                            ?>         
                                <th>
                                    <?php
                                        $holi= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$runAtt' AND currDay='monday' AND academicTerm='$term' AND academicSection='$section'");
                                        $holiDay=mysqli_fetch_array($holi);
                                        if($holiDay > 0){
                                            echo checkAttendance($stdName, $term, 'monday', $runAtt, $pcon);
                                        }else{
                                            if($runAtt <= $numWeek['currDay']){
                                                ?>
                                                    <i class="material-icons red-text-lighten-5 text-2 mt-2">highlight_off</i>
                                                <?php
                                            }
                                        }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                        $holi= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$runAtt' AND currDay='tuesday' AND academicTerm='$term' AND academicSection='$section'");
                                        $holiDay=mysqli_fetch_array($holi);
                                        if($holiDay > 0){
                                            echo checkAttendance($stdName, $term, 'tuesday', $runAtt, $pcon);
                                        }else{
                                            if($runAtt <= $numWeek['currDay']){
                                                ?>
                                                    <i class="material-icons red-text-lighten-5 text-2 mt-2">highlight_off</i>
                                                <?php
                                            }
                                        }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                        $holi= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$runAtt' AND currDay='wednesday' AND academicTerm='$term' AND academicSection='$section'");
                                        $holiDay=mysqli_fetch_array($holi);
                                        if($holiDay > 0){
                                            echo checkAttendance($stdName, $term, 'wednesday', $runAtt, $pcon);
                                        }else{
                                            if($runAtt <= $numWeek['currDay']){
                                                ?>
                                                    <i class="material-icons red-text-lighten-5 text-2 mt-2">highlight_off</i>
                                                <?php
                                            }
                                        }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                        $holi= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$runAtt' AND currDay='thursday' AND academicTerm='$term' AND academicSection='$section'");
                                        $holiDay=mysqli_fetch_array($holi);
                                        if($holiDay > 0){
                                            echo checkAttendance($stdName, $term, 'thursday', $runAtt, $pcon);
                                        }else{
                                            if($runAtt <= $numWeek['currDay']){
                                                ?>
                                                    <i class="material-icons red-text-lighten-5 text-2 mt-2">highlight_off</i>
                                                <?php
                                            }
                                        }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                        $holi= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$runAtt' AND currDay='friday' AND academicTerm='$term' AND academicSection='$section'");
                                        $holiDay=mysqli_fetch_array($holi);
                                        if($holiDay > 0){
                                            echo checkAttendance($stdName, $term, 'friday', $runAtt, $pcon);
                                        }else{
                                            if($runAtt <= $numWeek['currDay']){
                                                ?>
                                                    <i class="material-icons red-text-lighten-5 text-2 mt-2">highlight_off</i>
                                                <?php
                                            }
                                        }
                                    ?>
                                </th>
                            <?php
                        }
                    ?>
                </tr>                                                          
            <?php
            }
        }else{
            ?>
                <tr>
                    <th colspan="<?php echo $numWeek['studentClass']*5+2 ?>">No student in your class yet !</th>
                </tr>
            <?php
        }
    ?>
</table>
        </div>
    </div>
</div>
<?php
    function checkAttendance($student, $term, $day, $week, $pcon, $acadeYear=null){
        $attdence= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$week' AND currDay='$day' AND academicTerm='$term' AND studentFullName='$student'");
        $nunows=mysqli_num_rows($attdence);
        if($nunows > 0){
            return '<i class="material-icons teal-text text-2 mt-2">done_all</i>';
        }else{
            return '<i class="material-icons text-2 red-text mt-2">radio_button_checked</i>';
        }
    }
?>