<?php $child = 'subAllocation'; $page = 'Subjects'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
    <div class="container flow-text center ">
        <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
        Subject Allocation
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
<div class="showAlert"></div>
    <div class="row justify-content-center mt-5">
        <form method="get">
            <?php
                if(isset($_GET['submitAllocation'])){
                    $teacher=$_GET['teacher'];
                    $subject=$_GET['subject'];
                    $class=$_GET['class'];
                    $chifEX=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE subjects='$subject' AND class='$class'");
                    $exits=mysqli_num_rows($chifEX);
                    if($exits > 0){
                        $exitsdate=mysqli_fetch_array($chifEX);
                        ?>
                            <div class="pulse alert alert-warning pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Warrning!</strong> Subject Has already Been Allocated to <span style="font-weight:bold"><?php echo $exitsdate[2] ;?></span>  <br> Do you Wish To Change the Subject teacher <br>
                                <div class="btn green mt-2 white-text change">yes</div>
                                <input type="hidden" class="teacher1" value="<?php echo $teacher;?>">
                                <input type="hidden" class="class1" value="<?php echo $class;?>">
                                <input type="hidden" class="subject1" value="<?php echo $subject;?>">
                            </div>
                            <script>
                                setInterval(() => {
                                  $('.alert').css('margin-right','-3000px')
                                }, 10000);
                                $('.change').on('click',function(){
                                    $teach=$('.teacher1').val();
                                    $class1=$('.class1').val();
                                    $subject1=$('.subject1').val();
                                    $.ajax({
                                        type: 'get',
                                        url: 'change.php',
                                        cache: false,
                                        data:{'newteacher':$teach ,'class1':$class1 ,'subject1':$subject1 },
                                        success: function(returnData) {
                                            if(returnData =='done'){
                                                $('.alert').html='<div class="pulse alert alert-success pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Subject Allocation was Successful</div>';
                                            }
                                        }
                                    });
                                })
                            </script>
                        <?php
                    }else{
                        $allocate = mysqli_query($pcon,"UPDATE subjectlist SET teacher='$teacher',class='$class' WHERE subjects='$subject'");
                        if($allocate){
                            ?>
                                <script>
                              setInterval(() => {
                                  $('.alert').css('margin-right','-3000px')
                                  }
                              , 5000);
                              </script>
                              <div class="pulse alert alert-success pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Subject Allocation was Successful</div>
                            <?php
                        }
                    }
                }
            ?>
            <div class="z-depth-2 white p-3" style="width:500px;margin-top:15px;border-radius:3px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-field">
                            <select required name="teacher">
                                <option selected disabled>Select Teacher</option>
                                <?php 
                                    $getMyStudents= mysqli_query($pcon,"SELECT * FROM teacher ORDER BY formTeacher");
                                    $nStds=mysqli_num_rows($getMyStudents);
                                    if($nStds > 0){
                                        while ($student = mysqli_fetch_array($getMyStudents)){
                                            $fullname=$student['surname'].' '.$student['firstname'].' '.$student['lastname'];
                                            ?>
                                                <option value="<?php echo $fullname?>" data-icon="teacherImage/<?php echo $student['photo']?>"><?php echo $fullname?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-field">
                            <select required name="subject">
                                <option selected disabled>Select Subject</option>
                                <?php 
                                    $subject= mysqli_query($pcon,"SELECT * FROM subjectlist ORDER BY subjects");
                                    $sub=mysqli_num_rows($subject);
                                    if($sub > 0){
                                        while ($ject = mysqli_fetch_array($subject)){
                                            ?>
                                                <option value="<?php echo $ject[1]?>"><?php echo $ject[1]?></option>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <option>No Subject Yet please Add</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-field">
                            <select required name="class">
                                <option selected disabled>Select Class</option>
                                <option value="jss1">JSS 1</option>
                                <option value="jss1">JSS 2</option>
                                <option value="jss3">JSS 3</option>
                                <option value="sss1">SSS 1</option>
                                <option value="sss2">SSS 2</option>
                                <option value="sss3">SSS 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <button type="submit" name="submitAllocation" class="btn waves-effect waves-white white-text">submit</button>
                </div>
            </div>
        </form>
    </div>
</div>