<?php $child = 'addsub'; $page = 'Subjects'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
    <div class="container flow-text center ">
        <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
        Add Subject
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
<div class="main_body" style="margin-left:280px">
    <div class="row justify-content-center" style="">
        <div class="z-depth-2 white" style="width:450px;margin-top:15px;border-radius:3px;">
            <div class="row" style="margin:0px">
                <div class="col-md-12">
                    <div class="input-field">
                        <input type="text" class="input subjectName" id="subjectName">
                        <label style="pointer-events:none;">Enter Subject Name</label>
                    </div>
                </div>
            </div>
            <div class="center" style="margin-bottom:10px">
                <span class="disabled btn green lighten-2 waves-green waves-effect white-text">add now
                </span>
            </div>
            <div id="showMessage"></div>
        </div>
    </div>
</div>

<script>
    setInterval(() => {
        $('.alert').css('margin-right','-3000px')
        }
    , 5000);
    $('.input').on('keyup', function() {
        $ii = $('.subjectName').val().length;
        if( $ii >= 1){
            $('.waves-green').removeClass('disabled');
        }else{
            $('.waves-green').addClass('disabled');
        }
    });
    $('.waves-green').on('click', function() {
        $iiv = $('.subjectName').val();
        $.ajax({
            type: 'post',
            url: 'addingSubject.php',
            data: {'subjectName': $iiv,},
            success: function(returnData) {
                if (returnData == 'success') {
                    document.getElementById('showMessage').innerHTML='<div class="pulse alert alert-success pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Your subject has been uploaded successfully</div>';
                    var iiv = document.getElementById('subjectTeacher');
                    var iv = document.getElementById('subjectName');
                    iiv.value='';
                    iv.value='';
                    $('.waves-green').addClass('disabled');
                } else {
                    document.getElementById('showMessage').innerHTML='<div class="pulse alert alert-danger pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Sorry!</strong> This subject already exists</div>';
                    var iiv = document.getElementById('subjectTeacher');
                    var iv = document.getElementById('subjectName');
                    iiv.value='';
                    iv.value='';
                    $('.waves-green').addClass('disabled');
                }
            }
        });
    });
</script>