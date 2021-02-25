<?php $child = 'msgStd'; $page = 'message'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:9;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Message Student
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
<span class="btn-floating btn-large dnap waves-effect waves-indigo z-depth-4" style="position:fixed;bottom:15px;right:15px;"><i class="fa fa-dna"></i></span>
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:0px">
    <div class="white" style="">
        <div class="row" style="position:sticky;top:0px;">
            <div class="col-9" style="padding:2px 15px">
                <div class="nav-wrapper" style="">
                    <form>
                        <div class="input-field teal lighten-4" style="height:45px;border-radius:30px;">
                            <input id="search" style="border:1px solid gray;border-radius:30px;height:44px" type="search">
                            <label class="label-icon" for="search"><i class="fa fa-search" style="font-size:15px;position:relative;top:8px"></i></label>
                            <i class="material-icons"><i class="fa fa-times" style="font-size:15px;position:relative;bottom:2px"></i></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2">
                <span class="btn-floating btn-large" style="margin-top:7px;z-index:0"><i class="fa fa-bullhorn"></i></span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom:0px;height:40%;overflow-y:hidden;margin-top:-20px;">
        <div class="col-md-8 divf" style="padding:12px 2% !important">
            <div style="font-weight:bold;padding-left:5px"> All Students</div>
            <?php
                if($_SESSION['userType'] == 'teacher'){
                    ?>
                        <div class="teacherMessageStudent"></div>
                        <script>
                            function fetchlist21() {
                                $.ajax({
                                    url: 'teacherMessageStudent.php',
                                    success: function(returnData) {
                                        $('.teacherMessageStudent').html(returnData);
                                    }
                                });
                            }
                            fetchlist21();
                            setInterval(() => {
                                fetchlist21();
                            }, 5000);
                        </script>
                    <?php
                }elseif($_SESSION['userType'] == 'student'){
                    ?>
                        <div class="studentMessageStudent"></div>
                        <script>
                            function fetchlist21() {
                                $.ajax({
                                    url: 'studentMessageStudent.php',
                                    success: function(returnData) {
                                        $('.studentMessageStudent').html(returnData);
                                    }
                                });
                            }
                            fetchlist21();
                            setInterval(() => {
                                fetchlist21();
                            }, 5000);
                        </script>
                    <?php
                }elseif($_SESSION['userType'] == 'parent'){
                  
                }else{
                    ?>
                        <div class="adminMessageStudent"></div>
                        <script>
                            function fetchlist21() {
                                $.ajax({
                                    url: 'adminMessageStudent.php',
                                    success: function(returnData) {
                                        $('.adminMessageStudent').html(returnData);
                                    }
                                });
                            }
                            fetchlist21();
                            setInterval(() => {
                                fetchlist21();
                            }, 5000);
                        </script>
                    <?php
                }
            ?>
        </div>
        <div class="col-md-4 divs" style="overflow-y:scroll;overflow-x:hidden;height:100%">
            <div class="" style="padding-bottom:10px">
                <div style="padding-top:10px;">
                    <div style="font-weight:bold;padding-left:5px"> My Students</div>
                    <div class="white z-depth-3" style="border-radius:19px 0px 0px 19px;">
                        <div class="row parentImg">
                            <?php
                                if($_SESSION['userType'] == 'teacher'){
                                    $from=$_SESSION['formTeacher'];
                                    $getStudentr=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE studentCurrentClass='$from'");
                                    while($checkstudentr=mysqli_fetch_array($getStudentr)){
                                        $fullNamer = $checkstudentr[1];
                                        ?>
                                            <div class="col-4" style="padding:10px">
                                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="studentImage/<?php echo $checkstudentr[4]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                <div class="truncate"><?php echo $fullNamer?></div>
                                            </div>
                                        <?php
                                    }
                                }elseif($_SESSION['userType'] == 'student'){
                                
                                }elseif($_SESSION['userType'] == 'parent'){
                                
                                }else{
                                    $getStudentr=mysqli_query($pcon,"SELECT * FROM studentinfo ORDER BY chatnum desc");
                                    while($checkstudentr=mysqli_fetch_array($getStudentr)){
                                        $fullNamer = $checkstudentr[1];
                                        ?>
                                            <div class="col-4" style="padding:10px">
                                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="studentImage/<?php echo $checkstudentr[4]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                <div class="truncate"><?php echo $fullNamer?></div>
                                            </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div style="padding-top:10px;">
                        <div style="font-weight:bold;padding-left:5px">Active Student(s)</div>
                        <div class="white z-depth-2" style="content:'';border-radius:9px;">
                            <ul class="collection with-header z-depth-2" style="margin:0px;">
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div>
                <div class="">
                    <div style="padding-top:10px;">
                        <div style="font-weight:bold;padding-left:5px"> Unread Messages</div>
                        <div class="white z-depth-2" style="content:'';border-radius:9px;">
                            <ul class="collection with-header z-depth-2" style="margin:0px;">
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                                <li class="collection-item avatar" style="padding-bottom:0px;height:1px !important">
                                    <img src="webimage/42156f0bc3186270ef85f151b0d06492(1).png" class="circle" alt="Profile image">
                                    <span class="title">bube</span>
                                    <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                                    <p class="grey-text truncate">Active: 2 day ago</p>
                                    <a href="" class="secondary-content">
                                        <i class="badge teal white-text">17</i>
                                    </a>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>