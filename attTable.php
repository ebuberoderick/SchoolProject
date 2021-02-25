<?php session_start(); include_once 'DBconnect.php' ?>
<table class="table table-bordered white table-striped" style="margin:0px;">
    <tr>
        <th rowspan="2" class="center pt-4">NO.</th>
        <th rowspan="2" class="center pt-4" style="width:1000px;padding:2px 45px">Students Name</th>
        <?php
            $vm =$_SESSION['formTeacher'];
            $myClass = $_SESSION['formTeacher'];
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
        $myClass = $_SESSION['formTeacher'];
        $getMyStudents= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE studentCurrentClass='$myClass'");
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
                                            if($runAtt < $numWeek['studentClass']){
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
                                            if($runAtt < $numWeek['studentClass']){
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
                                            if($runAtt < $numWeek['studentClass']){
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
                                            if($runAtt < $numWeek['studentClass']){
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
                                            if($runAtt < $numWeek['studentClass']){
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
<?php
    function checkAttendance($student,$term, $day, $week, $pcon, $acadeYear=null){
        $attdence= mysqli_query($pcon,"SELECT * FROM attendence WHERE week='$week' AND currDay='$day' AND academicTerm='$term' AND studentFullName='$student'");
        $nunows=mysqli_num_rows($attdence);
        if($nunows > 0){
            return '<i class="material-icons teal-text text-2 mt-2">done_all</i>';
        }else{
            return '<i class="material-icons text-2 red-text mt-2">radio_button_checked</i>';
        }
    }
?>