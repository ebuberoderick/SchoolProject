<?php $child = 'viewTeacher'; $page = 'Records'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    All Students
    <?php
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        // echo $diV;
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
    ?>
  </div>
</nav>
<div class="main_body" style="margin-left:280px;overflow-x:hidden">
    <div class="" style="padding:3%">
        <div class="z-depth-2 white" style="">
            <div class="">
                <div class="row darken-5" style="margin:0px;padding-top:0px;">
                    <div class="col-md-3 headView" style="padding-top:7px">
                        Total Number of Teachers : 
                        <span style="font-weight:bold">
                            <?php 
                                $myClass = $_SESSION['formTeacher'];
                                $getMyStudents= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE studentCurrentClass='$myClass'");
                                $nStds=mysqli_num_rows($getMyStudents); echo $nStds;
                            ?>
                        </span>
                        <br>Teachers Name
                    </div>
                    <div class="col-md-9 bodyViwe" style="padding:0px">
                        <nav>
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field teal lighten-3">
                                    <input id="search" type="search">
                                    <label class="label-icon" for="search"><i class="fa fa-search"></i></label>
                                    <i class="material-icons"><i class="fa fa-times"></i></i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <?php 
                    if($nStds > 0){
                        while ($student = mysqli_fetch_array($getMyStudents)){
                            ?>                
                                <div class="" style="padding:10px;cursor:pointer;border-top:1px solid rgba(194, 194, 194, 0.856)">
                                    <img width="50px" height="50px" src="/studentImage/<?php echo $student['studentImage'];?>" class="circle red">
                                    <span style="text-transform:capitalize;font-size:1.1rem;position:relative;left:4px">
                                        <?php
                                            echo $student['surName'].' '.$student['firstName'].' '.$student['otherName'];
                                        ?>
                                    </span>
                                </div>
                            <?php 
                        }
                    }else{
                        ?>
                            <div class="" style="padding:10px;cursor:pointer;border-top:1px solid rgba(194, 194, 194, 0.856)">
                                No student in your class yet !
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>