<?php $child = 'removestd'; $page = 'Student'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Remove Student
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
    $getMyStudents= mysqli_query($pcon,"SELECT * FROM studentinfo ORDER BY studentCurrentClass");
    $nStds=mysqli_num_rows($getMyStudents);
?>
<div class="main_body" style="margin-left:280px;overflow-x:hidden">
    <div class="" style="padding:3%">
        <div id="login_container" style="">
            <div class="row center justify-content-center" style="margin:0px !important;padding:0px !important">
                <div style="width:400px;">
                    <div class="form z-depth-5 white" style="margin-bottom:7vh;padding:10px">
                        <div class="form-body">
                            <form method="post">
                                <div class="">
                                    <div class="input-field" style="padding:0px 10px">
                                        <i class="prefix fa fa-user" style="font-size:20px;position:absolute;top:20px;"></i>
                                        <?php
                                            if($nStds > 0){
                                                echo '<input type="text" id="reds" name="username" style="">';
                                            }else{
                                                echo '<input type="text" disabled id="reds" name="username" style="">';
                                            }
                                        ?>
                                        <label style="pointer-events:none;padding-left:13px">Enter Student Name</label>
                                    </div>
                                <button class="btn red waves-effect lighten-2" style="z-index:0" name="login">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card z-depth-2" style="">
            <div class="table-responsive-md">
                <div class="row darken-5" style="margin:0px;padding-top:15px;">
                    <div class="col-8">Student Name (Class)</div>
                    <div class="col-4">
                        <label class="right non">
                            <input class="call" type="checkbox"/>
                            <span></span>
                        </label>
                        <label class="right nons" style="display:none">
                            <input disabled type="checkbox"/>
                            <span></span>
                        </label>
                    </div>
                </div>
                <ul class="collection" style="margin:0px">
                    <?php
                        if($nStds > 0){
                            while ($student = mysqli_fetch_array($getMyStudents)){
                                ?>
                                    <label class="container-fluid" style="padding:0px">
                                        <li class="collection-item avatar" style="height:10px;padding-bottom:0px;padding-top:25px">
                                            <img src="/studentImage/<?php echo $student['studentImage'];?>" class="circle red">
                                            <span style="text-transform:capitalize;font-size:1.1rem;position:relative;top:11px">
                                                <?php
                                                    echo $student['surName'].' '.$student['firstName'].' '.$student['otherName'].' '.' ('.$student['studentCurrentClass'].')';
                                                ?>
                                            </span>
                                            <input class="rmove" value="<?php echo $student['contactMail'];?>" type="checkbox">
                                            <span class="checkmark" style="float:right;padding:15px;position:relative;top:11px"></span>
                                        </li>
                                    </label>
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
                                    No student in your class yet !
                                </label>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
        <?php
            if($nStds > 0){
                echo '<button class="btn btn red waves-effect lighten-2 z-depth-3" name="login">Remove Student</button>';
            }else{
                echo '<button class="btn btn red disabled waves-effect lighten-2 z-depth-3" name="login">Remove Student</button>';
            }
        ?>
    </div>
</div>