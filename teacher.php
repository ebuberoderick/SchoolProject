<?php $child = 'removeteacher'; $page = 'teacher'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Teachers
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
<?php 
    $getMyStudents= mysqli_query($pcon,"SELECT * FROM teacher ORDER BY formTeacher");
    $nStds=mysqli_num_rows($getMyStudents);
?>
<div class="main_body" style="margin-left:280px;overflow-x:hidden">
    <div class="" style="padding:">
        <div class="card z-depth-2 mb-2" style="">
            <div class="table-responsive-md">
                <div class="row darken-5" style="margin:0px;padding-top:15px;">
                    <div class="col-8 pb-3">Teachers Name ( Appointment / Position )</div>
                </div>
            </div>
        </div>
        <?php
            if($nStds > 0){
                while ($student = mysqli_fetch_array($getMyStudents)){
                    ?>
                        <div class="z-depth-2 p-2 white mb-2" style="cursor:pointer;border-radius:10px;margin:0px;">
                            <span class="center" style="margin:3px 0px;">
                                <img src="teacherImage/<?php echo $student['photo'];?>" class="circle red" style="width:50px;height:50px">
                            </span>
                            <span class="pt-3 pb-3 pl-2" style="width:30px;border-left:2px solid grey;text-transform:capitalize;font-size:1.1rem;position:relative;top:2px">
                                <?php
                                    echo $student['surname'].' '.$student['firstname'].' '.' ('.$student['formTeacher'].')';
                                ?>
                            </span>
                            <span class="right  center" style="display:flex;justify-content:center;padding:2px 22px">
                                <span class="btn red white-text waves waves-effect" style="cursor:pointer">
                                    <i class="fa fa-trash-alt"></i>
                                    <span class=""> Remove</span>
                                </span>
                                <span class="ml-2 blue white-text p-2 waves waves-effect" style="cursor:pointer">
                                    <i class="far fa-star"></i>
                                    <span class="pt-2 ml-1"> Appoint</span>
                                </span>
                            </span>
                        </div>
                    <?php
                }
            }else{
                ?>
                    <script>
                        $('.non').css('display','none');
                        $('.nons').css('display','block');
                        $('.red').addClass('disabled');
                        $('#reds').addAttr('disabled');
                    </script>
                    <label class="container-fluid pl-2" style="padding:0px;font-size:20px">
                        No Teacher yet !
                    </label>
                <?php
            }
        ?>
    </div>
</div>


