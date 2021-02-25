<?php $child = 'attd'; $page = 'Records'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:9;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Attendence Sheet
    <?php
        $vm =$_SESSION['formTeacher'];
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
    ?>
  </div>
</nav>
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:15px !important">
    <div class="m-2 row">
        <div class="col-md-3 p-2">
            <div class="flow-text">Table Key:</div>
            <div class="white mr-3 pl-2 z-depth-4" style="border-radius:9px">
                <span><i class="material-icons text-2 red-text mt-2">radio_button_checked</i><span style="position:relative;top:-7px;left:3px;padding-right:20px">: Absent</span></span>
                <span><i class="material-icons teal-text text-2 mt-2">done_all</i><span style="position:relative;top:-7px;left:3px">: Present</span></span><br>
                <span><i class="material-icons red-text-lighten-5 text-2 mt-2">highlight_off</i><span style="position:relative;top:-7px;left:3px">: Not a school day</span></span>
            </div>
        </div>
        <div class="col-md-9 p-2">
            <div class="flow-text">Students Present Today</div>
            <div class="row persentToday white z-depth-4" style="padding:15px;border-radius:15px;">
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider1.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider2.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider3.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider4.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider5.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider6.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider7.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider8.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider9.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
                <div class="col-4 chip">
                    <img class="img-fluid" style="z-index:-1" src="/webImage/slider10.jpg" alt="" srcset="">
                    <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $myClass = $_SESSION['formTeacher'];
        $numberschoolweek= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
        $numWeek = mysqli_fetch_array($numberschoolweek);
        $term = $numWeek['academicTerm'];
        $section = $numWeek['academicSection'];
        $todayAtt = $numWeek['currDay'];
        $wekAtt = $numWeek['week'];
    ?>
    <div class="stdAttTable table-responsive table_div p-0"></div>
    <form method="post">
        <?php
            if(isset($_POST['stuadtdbtn'])){
                $wee = $_POST['wee'];
                $day = $_POST['day'];
                $sectiont = $_POST['section'];
                $termt = $_POST['term'];
                $stdPreN = $_POST['studentsNameo'];
                $alreadyTakensub =mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='$stdPreN' AND academicSection='$sectiont' AND academicTerm='$termt' AND week='$wee' AND currDay='$day'");
                $alreadyTakenSubNum =mysqli_num_rows($alreadyTakensub);
                if($alreadyTakenSubNum < 1){
                    $attTaken = $ocon->query("INSERT INTO attendence(academicSection,academicTerm,week,currDay,studentFullName,studentClass) VALUE('$sectiont','$termt','$wee','$day','$stdPreN','$myClass')");
                    if($attTaken){
                        ?>
                        <script>
                            setInterval(() => {
                                $('.alert').css('margin-right','-3000px')
                            }
                            , 5000);
                        </script>
                        <div class="pulse alert alert-success pt-4 pb-4 " style="position:fixed;right:15px;top:80px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> <span style="text-transform:capitalize"><?php echo $stdPreN;?> </span> was present today</div>
                        <?php
                    }
                }
            }
        ?>
          <div style="position:absolute;width:75vw">
            <div class="row mt-4" style="position:relative">
                <div class=""></div>
                <button name="stuadtdbtn" type="submit" class="disabled stuadtdbtn col-md-3 btn teal accent-4 waves-effect waves-teal white-text" style="position:relative">take attendence</button>
                <div class="col-md-9 attdBlock">
                    <input value="<?php echo $todayAtt;?>" name="wee" style="display:none">
                    <input value="<?php echo $wekAtt;?>" name="day" style="display:none">
                    <input value="<?php echo $section;?>" name="section" style="display:none">
                    <input value="<?php echo $term; ?>" name="term" style="display:none">
                    <select name="studentsNameo" class="stuadtd">
                        <option value="" disabled selected>Select a student</option>
                        <?php
                            $getMyStudentsSelect = mysqli_query($pcon,"SELECT * FROM studentinfo WHERE studentCurrentClass='$myClass'");
                            $nStdsSelect=mysqli_num_rows($getMyStudentsSelect);
                            if($nStdsSelect > 0){
                                while ($studentSelect = mysqli_fetch_array($getMyStudentsSelect)){
                                    $fullname =$studentSelect['surName'].' '.$studentSelect['firstName'].' '.$studentSelect['otherName'];
                                    $alreadyTaken = mysqli_num_rows(mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='$fullname' AND currDay='$wekAtt' AND week='$todayAtt' AND academicSection='$section' AND academicTerm='$term'"));
                                    if(!$alreadyTaken){
                                        ?>
                                        <option value="<?php echo $fullname?>" data-icon="/studentImage/<?php echo $studentSelect['studentImage']?>"><?php echo $fullname?></option>
                                        <?php
                                    }
                                }
                            }else{
                                ?>
                                    <option value="">No student in your class yet !</option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>  
    </form>
</div>

<script>
    $('.stuadtd').on('change',()=>{
        $('.stuadtdbtn').removeClass('disabled');
    });
    function stdAttTable() {
        $.ajax({
            url: 'attTable.php',
            cache: false,
            success: function(returnData) {
                $('.stdAttTable').html(returnData);
            }
        });
    }
    stdAttTable();
    setInterval(() => {
        stdAttTable();
    }, 300);

</script>