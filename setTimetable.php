<?php $child = 'set'; $page = 'Timetable'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Set Timetable
    <?php
        $v= $_SESSION['formTeacher'] ;
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
    ?>
  </div>
</nav>
<div class="main_body" style="margin-left:280px;overflow-x:hidden">
    <div class="row center justify-content-center">
        <div class="card z-depth-2 white" style="padding:10px">
            <p class="flow-text">Timetable Type</p>
            <div style="padding-top:0px">
                <p class="row">
                    <label style="padding-right:50px">
                        <input type="radio" name="optradio" id="lecture" class="with-gap tTable">
                        <span>Lecture Timetable</span>
                    </label>
                    <label style="padding-right:50px">
                        <input type="radio" name="optradio" id="test" class="with-gap tTable">
                        <span>Test Timetable</span>
                    </label>
                    <label style="padding-right:50px">
                        <input type="radio" name="optradio" id="exam" class="with-gap tTable">
                        <span>Examination Timetable</span>
                    </label>
                </p>
            </div>
        </div>
    </div>     
    <div class="form" style="display:none">
        <div class="lecture">
            <?php include_once 'lecture.php' ?>
        </div>
        <div class="test">
            <?php include_once 'test.php' ?>
        </div>
        <div class="exam">
            <?php include_once 'exam.php' ?>
        </div>
    </div>
</div>