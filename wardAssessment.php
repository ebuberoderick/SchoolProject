<?php $page = 'wardsAss'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:9;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Ward(s) Assessment
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
    
</div>