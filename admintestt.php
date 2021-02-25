<?php $child = 'atestt'; $page = 'AdmT'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
    <div class="container flow-text center ">
        <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
        Test Timetable
        <?php
            $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
            $timeState=mysqli_fetch_assoc($time);
            $diV=$timeState['showTime'];
            if($diV == 'checked'){
                echo '<div class="timeStamp right"></div>';
            }
        ?>
    </div>
</nav>
<div class="main_body" style="margin-left:280px;">
    <div class="row justify-content-center mt-5">
        <div class="z-depth-2 white pl-3" style="width:400px;margin-top:15px;border-radius:3px;">
            <p class="row"> 
            <h6>Select a class :</h6>
                <label style="padding-right:50px">
                    <input type="radio" name="optradio" id="Jss1" class="with-gap tTable">
                    <span>Jss 1</span>
                </label>
                <label style="padding-right:50px">
                    <input type="radio" name="optradio" id="Jss2" class="with-gap tTable">
                    <span>Jss 2</span>
                </label>
                <label style="padding-right:50px">
                    <input type="radio" name="optradio" id="Jss3" class="with-gap tTable">
                    <span>Jss 3</span>
                </label>
                
                <label style="padding-right:50px">
                    <input type="radio" name="optradio" id="sss1" class="with-gap tTable">
                    <span>Sss 1</span>
                </label>
                <label style="padding-right:50px">
                    <input type="radio" name="optradio" id="sss2" class="with-gap tTable">
                    <span>Sss 2</span>
                </label>
                <label style="padding-right:50px">
                    <input type="radio" name="optradio" id="sss3" class="with-gap tTable">
                    <span>Sss 3</span>
                </label>
            </p>
        </div>
    </div>
</div>
              