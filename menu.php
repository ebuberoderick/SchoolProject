<?php
    session_start();
    if(isset($_SESSION['username'])){	 	 	 
        include_once 'DBconnect.php';
        $user = $_SESSION['username'];
        if($_SESSION['userType']=='teacher'){
            $nrows=mysqli_num_rows(mysqli_query($pcon,"SELECT username FROM teacher WHERE username='$user'"));
            if($nrows < 1){
                header('location:login.php');
            }
        }elseif($_SESSION['userType'] =='student'){
            $nrows=mysqli_num_rows(mysqli_query($pcon,"SELECT username FROM studentinfo WHERE username='$user'"));
            if($nrows < 1){
                header('location:login.php');
            }
        }elseif($_SESSION['userType'] =='parent'){
            $nrows=mysqli_num_rows(mysqli_query($pcon,"SELECT username FROM parentinfo WHERE username='$user'"));
            if($nrows < 1){
                header('location:login.php');
            }
        }else{
            $nrows=mysqli_num_rows(mysqli_query($pcon,"SELECT username FROM teacher WHERE username='$user'"));
            if($nrows < 1){
                header('location:login.php');
            }
        }
    }
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4/css/bootstrap.css">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="fir/css/all.css">
    <link rel="icon" href="webImage/index.jpg">
    <link href='styles/main.css' rel='stylesheet' />
    <link href='styles/slick.css' rel='stylesheet' />
    <link href='styles/material-icons.css' rel='stylesheet' />
    <link href='styles/emojionearea.min.css' rel='stylesheet' />
    <link href='styles/slick-theme.css' rel='stylesheet' />
    <link rel="stylesheet" href="styles/custom.css">
    <title>Claret | Addministrative Portal</title>
</head>
<body>
    <div class="over-lay"></div>
    <div class="menu white lighten-3 z-depth-3" style="overflow-y:scroll;z-index:100;transition:0.5s">
        <div class="jumbotron lighten-5" style="height:200px;border-radius:0px;padding:50px 10px;padding-bottom:20px;margin-bottom:0px;position:sticky;top:0px;z-index:100">
            <span class="white-text" style="font-size:22px;text-shadow: 0px 0px 0px;cursor:pointer;position:absolute;right:20px;top:10px"><i class="fa fa-times times"></i></span>
            <div style="position:inline-block;">
                <?php
                    $name=$_SESSION['username'];
                    if($_SESSION['userType']=='teacher'){
                        $fTi=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$name'");
                        $fTiData = mysqli_fetch_assoc($fTi);
                        ?>
                            <img src="/teacherImage/<?php echo $fTiData['photo'] ?>" class="rounded-circle materialboxed" style="width:90px;height:90px" alt="Profile image">
                        <?php
                    }elseif($_SESSION['userType'] =='student'){
                        $fTi=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE username='$name'");
                        $fTiData = mysqli_fetch_assoc($fTi);
                        ?>
                            <img src="/studentImage/<?php echo $fTiData['studentImage'] ?>" class="rounded-circle materialboxed" style="width:90px;height:90px" alt="Profile image">
                        <?php
                    }elseif($_SESSION['userType'] =='parent'){
                        $fTi=mysqli_query($pcon,"SELECT * FROM parentinfo WHERE username='$name'");
                        $fTiData = mysqli_fetch_assoc($fTi);
                        ?>
                            <img src="/parentImage/<?php echo $fTiData['parentImg']?>" class="rounded-circle materialboxed" style="width:90px;height:90px" alt="Profile image">
                        <?php
                    }else{
                        $fTi=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$name'");
                        $fTiData = mysqli_fetch_assoc($fTi);
                        ?>
                            <img src="/teacherImage/<?php echo $fTiData['photo']?>" class="rounded-circle materialboxed" style="width:90px;height:90px" alt="Profile image">
                        <?php
                    }
                ?>
                <span class="white-text text-accent-3 left" style="text-shadow: 1px 1px 3px;position:absolute;padding-top:5px;padding-left:5px;text-transform:capitalize;font-weight:bold;">
                    <?php echo $_SESSION['name'];?><br><?php echo $_SESSION['userType']?>
                </span>
            </div>
        </div>
        <div class="collection" style="height:;margin:0px;">
            <a href="index.php" class="waves-effect collection-item <?php if($page=='index'){ echo 'active';}?>"><img src="webImage/dashboard.png" style="width:30px"> Dashboard</a>
            <div class="">
                <?php
                    if($_SESSION['userType'] == 'teacher'){
                        ?>
                            <a class="drop waves-effect collection-item <?php if($page=='message'){echo 'active';}?>"><img src="webImage/message.png" style="width:30px"> Messageing  <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <?php
                                    $fTi=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$name'");
                                    $fTiDatad = mysqli_fetch_assoc($fTi);
                                   if($fTiDatad['formTeacher']!='null'){
                                        ?>
                                            <a href="messageStudent.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgStd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Student</a>
                                            <a href="messageParent.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgPrt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Parent</a>
                                        <?php
                                   } 
                                ?>
                                <a href="messageteacher.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgtrt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Teacher</a>
                            </div>
                        <?php
                    }elseif($_SESSION['userType'] == 'student'){
                        ?>
                            <a class="drop waves-effect collection-item <?php if($page=='message'){echo 'active';}?>"><img src="webImage/message.png" style="width:30px"> Messageing  <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="messageStudent.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgStd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Student</a>
                                <a href="messageteacher.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgtrt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Teacher</a>
                            </div>
                        <?php
                    }elseif($_SESSION['userType'] == 'parent'){
                        ?>
                            <a href="messageteacher.php" class="waves-effect collection-item <?php if($page=='message'){echo 'active';}?>"><img src="webImage/message.png" style="width:30px"> Message Teacher </a>
                        <?php
                    }else{
                        ?>
                            <a class="drop waves-effect collection-item <?php if($page=='message'){echo 'active';}?>"><img src="webImage/message.png" style="width:30px"> Messageing  <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="messageStudent.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgStd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Student</a>
                                <a href="messageParent.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgPrt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Parent</a>
                                <a href="messageteacher.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='msgtrt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Message Teacher</a>
                            </div>
                        <?php
                    }
                ?>
            </div>
            <?php
                if($_SESSION['userType'] == 'teacher'){
                    $fTi=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$name'");
                    $fTiDatad = mysqli_fetch_assoc($fTi);
                    if($fTiDatad['formTeacher']!='null'){
                        ?>
                            <div class="">
                                <a class="drop waves-effect collection-item <?php if($page=='Records'){echo 'active';}?>"><img src="webImage/mstudent.png" style="width:30px"> Manage Class <i class="fa fa-angle-left right"></i></a>
                                <div class="drop-down-menu" style="display:none">
                                    <a href="attendence.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='attd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Attendence</a>
                                    <a href="viewStd.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='viewstd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> My Sutdents</a>
                                    <a href="viewTeacher.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='viewTeacher'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> My Class Teachers</a>
                                </div>
                            </div>
                            <div class="">
                                <a class="drop waves-effect collection-item  <?php if($page=='studentR'){echo 'active';}?>"><img src="webImage/records.png" style="width:30px"> Students Records <i class="fa fa-angle-left right"></i></a>
                                <div class="drop-down-menu" style="display:none">
                                    <a href="assessment.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='assess'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Assessment</a>
                                    <a href="results.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='result'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Results</a>
                                </div>
                            </div>
                            <div class="">
                            <a class="drop waves-effect collection-item <?php if($page=='Timetable'){echo 'active';}?>"><img src="webImage/Ttable.png" style="width:30px"> Students Timetable <i class="fa fa-angle-left right"></i></a>
                                <div class="drop-down-menu" style="display:none">
                                    <a href="lectureTimetable.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='lecture'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Lecture Timetable</a>
                                    <a href="testTimetable.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='test'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Test Timetable</a>
                                    <a href="examTimetable.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='exam'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Examination Timetable</a>
                                    <a href="setTimetable.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='set'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Set Timetable</a>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                        <a href="teacherTable.php" class="waves-effect collection-item <?php if($page=='teacherTable'){echo 'active';}?>">
                            <img src="webImage/gh.png" style="width:30px"> My Timetable 
                        </a>
                        <a href="submitRecord.php" class="waves-effect collection-item <?php if($page=='submitRecord'){echo 'active';}?>">
                            <img src="webImage/subm.png" style="width:30px"> Submit Student Record 
                        </a>
                    <?php
                }elseif($_SESSION['userType'] == 'student'){
                    ?>
                        <div class="">
                            <a class="drop waves-effect collection-item <?php if($page=='Timetable'){echo 'active';}?>"><img src="webImage/tavle.png" style="width:30px"> Timetable <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="lectureTimetable.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='lecture'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Lecture Timetable </a>
                                <a href="testTimetable.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='test'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Test Timetable</a>
                                <a href="examTimetable.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='exam'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">View Exam Timetable</a>
                            </div>
                        </div>
                        <div class="">
                            <a class="drop waves-effect collection-item <?php if($page=='Studentr'){echo 'active';}?>"><img src="webImage/assess.png" style="width:30px"> Records <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="studentAttd.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='StuddentAtt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Attendence</a>
                                <a href="removeStd.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='removestd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Assessment</a>
                                <a href="viewStd.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='viewstd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Results</a>
                            </div>
                        </div>
                        <a href="classteacher.php" class="waves-effect collection-item <?php if($page=='classteacher'){echo 'active';}?>">
                            <img src="webImage/teacher.png" style="width:30px"> My Class Teachers 
                        </a>
                    <?php
                }elseif($_SESSION['userType'] == 'parent'){
                    ?>
                        <a href="wardsATTD.php" class="waves-effect collection-item <?php if($page=='wardsAtt'){echo 'active';}?>">
                            <img src="webImage/att.png" style="width:30px"> Wards Attendence 
                        </a>
                        <a href="wardAssessment.php" class="waves-effect collection-item <?php if($page=='wardsAss'){echo 'active';}?>"><img src="webImage/assess.png" style="width:30px"> Wards Assessment </a>
                        <a href="wardsResult.php" class="waves-effect collection-item <?php if($page=='wardsRes'){echo 'active';}?>"><img src="webImage/res.png" style="width:30px"> Wards Results </a>
                    <?php
                }else{
                    ?>
                        <div class="">
                            <a class="drop waves-effect collection-item <?php if($page=='teacher'){echo 'active';}?>"><img src="webImage/teacher.png" style="width:30px"> Manage Teacher <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="addteacher.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='addteacher'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Add Teacher </a>
                                <a href="teacher.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='removeteacher'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Teachers</a>
                            </div>
                        </div>
                        <div class="">
                            <a class="drop waves-effect collection-item <?php if($page=='Student'){echo 'active';}?>"><img src="webImage/mstudent.png" style="width:30px"> Manage Student <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="addStd.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='addstd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Add Student </a>
                                <a href="removeStd.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='removestd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Remove Student</a>
                                <a href="viewStdAdmin.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='viewstd'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">View  Students</a>
                            </div>
                        </div>
                        <div class="">
                            <a class="drop waves-effect collection-item <?php if($page=='Subjects'){echo 'active';}?>"><img src="webImage/subj.png" style="width:30px"> Manage Subject <i class="fa fa-angle-left right"></i></a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="addSub.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='addsub'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Add Subject </a>
                                <a href="removeSub.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='removesub'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Remove Subject</a>
                                <a href="subAllocation.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='subAllocation'){ echo 'active teal lighten-5';}?>" style="padding-left:45px"> Subject Allocation</a>
                                <a href="viewSub.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='viewsub'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">View  Subjects</a>
                            </div>
                        </div>
                        <div class="">
                            <a class="drop waves-effect collection-item <?php if($page=='AdmT'){echo 'active';}?>"><img src="webImage/tavle.png" style="width:30px"> Timetable <i class="fa fa-angle-left right"></i> </a>
                            <div class="drop-down-menu" style="display:none">
                                <a href="adminTimet.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='atimt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Lecture Timetable </a>
                                <a href="admintestt.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='atestt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">Test Timetable</a>
                                <a href="adminexamt.php" class="waves-effect collection-item grey-text darken-5 <?php if($child=='adminexamt'){ echo 'active teal lighten-5';}?>" style="padding-left:45px">View Exam Timetable</a>
                            </div>
                        </div>
                    <?php
                }
            ?>
            <a href="setting.php" class="waves-effect collection-item <?php if($page=='setting'){echo 'active';}?>"> <img src="webImage/settings.png" style="width:30px"> Settings</a>
        </div>
        <div class="p-3 mt-5 center">
            <a class="modal-trigger z-depth-3 waves-effect red lighten-2" href="#logoutModal" style="color:white;border-radius:9px;padding:5px 56px;text-decoration:none;font-size:20px;letter-spacing: 2px;" title="Logout">
                <i class="fa fa-sign-out-alt"></i>Logout
            </a>
        </div>
        <div id="logoutModal" class="modal mt-5 center" style="height:40vh;align-self:center">
            <div class="modal-content pt-5" style="height:100%;display:flex;align-items:center">
            <h4>Are You Sure You Want To logout</h4>
            <div class="mt-5 pt-5" style="display:flex">
                <a href="logout.php" style="margin-right:35%;" class="btn btn-success">
                    <i class="fa fa-check"></i>
                </a>
                <a style="margin-right:35%;" class="modal-close red btn btn-danger">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            </div>
        </div>
        <span>
            <a href="#!">You can Visit our school website</a>
        </span>
    </div>
    <?php $page = 'index'; include 'load.html' ?>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/push.min.js"></script>
    <script src="scripts/Chart.js"></script>
    <script src="scripts/utils.js"></script>
    <script src='scripts/main.js'></script>
    <script src="scripts/custom.js"></script>
    <script src="scripts/slick.min.js"></script>
    <script src="scripts/emojionearea.min.js"></script>
    <script src="bootstrap-4/js/bootstrap.js"></script>
    <script src="materialize/js/materialize.js"></script>
    <script>
         $('.modal').modal({});
    </script>
</body>
</html>