<div class="row justify-content-center">
    <div class="card z-depth-2 " style="width:500px;padding:10px">
        <div id="formContent">
            <p class="flow-text center" id="changeTableDay">Lecture</p>
            <div class="row">
                <select name="weekDay" class="changeTableDay col-md-6 form-control">
                    <option value="" disabled selected>Choose Day</option>
                    <option value="monday">Monday</option>
                    <option value="tuseday">Tuesday</option>
                    <option value="wednesday">wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                </select>
            </div>
            <div class="row">
                <ul class="row center col-md-12">
                    <div class="col-md-6" style="margin:0;padding:0">
                        <li style="font-weight:bold;">8:00am - 8:45am
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">
                                    <?php
                                        $currenSubj= mysqli_query($pcon,"SELECT * FROM lectuertimetable WHERE dayTime='8:00am - 8:45am' AND classLevel='$v'");
                                        $nrows=mysqli_num_rows($currenSubj);
                                        if($nrows==1){
                                            $subVal=mysqli_fetch_assoc($currenSubj);
                                            echo $subVal['lSubject'];
                                        }else{
                                            echo 'No Subject Yet';
                                        };
                                    ?>
                                </option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select>                       
                        </li>
                        <li style="font-weight:bold;">8:45am - 9:30am
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">Current Subject</option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select> 
                        </li>
                        <li style="font-weight:bold;">9:30am - 10:15am
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">Current Subject</option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select> 
                        </li>
                        <li style="font-weight:bold;">10:15am - 11:00am
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">Current Subject</option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select> 
                        </li>
                    </div>
                    <div class="col-md-6" style="margin:0px;padding:0">
                        <li style="font-weight:bold;">11:45am - 12:30pm
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">Current Subject</option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select> 
                        </li>
                        <li style="font-weight:bold;">12:30pm - 1:15pm
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">Current Subject</option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select> 
                        </li>
                        <li style="font-weight:bold;">1:15pm - 2:00pm
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">Current Subject</option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select> 
                        </li>
                        <li style="font-weight:bold;">2:00pm - 2:45pm
                            <select disabled class="changeValue col-md-11 form-control">
                                <option disabled selected class="chooseDay">Choose Day</option>
                                <option class="currentSubject">Current Subject</option>
                                <?php
                                    $check=mysqli_query($pcon,"SELECT * FROM subjectlist WHERE class='$v'");
                                    $nrow=mysqli_num_rows($check);
                                    if($nrow > 0){?>
                                        <?php
                                            while ($nrow = mysqli_fetch_array($check)){
                                                if($nrow['subjects'] != $subVal['lSubject']){
                                                    ?>
                                                        <option value="<?php echo $nrow['subjects']; ?>"><?php echo $nrow['subjects']; ?></option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    <?php
                                    }else{
                                        echo '<option disabled> There Is No Subject Yet For This Class</option>';
                                    }
                                ?>
                            </select> 
                        </li>
                    </div>
                </ul>
            </div>
            <div class="center">
                <span class="disabled btn green lighten-2 waves-green waves-effect white-text">Submit
                </span>
            </div>
        </div>
    </div>
</div> 

<script>
    $('.changeTableDay').on('change', function() {
        $i = $(this).children('option:selected').val();
        $('.changeValue').removeAttr('disabled');
        $('.chooseDay').removeAttr('selected');
        $('.chooseDay').css('display','none');
        $('.currentSubject').addAttr('selected');
    });
    $('.changeValue').on('change', function() {
        $i = $(this).children('option:selected').val();
        $('.waves-green').removeClass('disabled');
    });
    $('.waves-green').click(()=>{});
    $('select').material_select();
</script>