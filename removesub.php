<?php $child = 'removesub'; $page = 'Subjects'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
    <div class="container flow-text center ">
        <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
        Remove Subject
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
<div class="main_body" style="margin-left:280px">
    <div class="row justify-content-center">
        <div class="z-depth-2 white" style="width:400px;margin-top:15px;border-radius:3px;">
            <div class="row" style="margin:0px">
                <div class="col-md-12">
                    <div class="input-field">
                        <input type="text" class="input subjectName" id="subjectName">
                        <label style="pointer-events:none;">Enter Subject Name</label>
                    </div>
                </div>
                <input type="text" class="class" value="<?php echo $_SESSION['formTeacher'];?>" style="display:none">
            </div>
            <div class="center" style="margin-bottom:10px">
                <span class="disabled btn green lighten-2 waves-green waves-effect white-text">remove now
                </span>
            </div>
            <div id="showMessage"></div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="z-depth-2 white subList" style="padding:15px;display:none;width:300px;margin-top:15px;border-radius:3px;">
            <div class="subList1"></div>
            <div class="red-text"><span class="subList2" style="font-weight:bold"></span><span class="subList21"></span></div>
        </div>
    </div>
</div>

<script>
    setInterval(() => {
        $('.alert').css('margin-right','-3000px')
        }
    , 5000);
    $('.input').on('keyup', function() {
        $i = $('.subjectName').val().length;
        if($i >= 1){
            $('.waves-green').removeClass('disabled');
        }else{
            $('.waves-green').addClass('disabled');
        }
    });
    $('.waves-green').on('click', function() {
        $iv = $('.subjectName').val();
        $.ajax({
            type: 'post',
            url: 'removingSubject.php',
            data: {'subjectName': $iv,},
            success: function(returnData) {
                if (returnData == 'success') {
                    document.getElementById('showMessage').innerHTML='<div class="pulse alert alert-success pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Your subject has been uploaded successfully</div>';
                    var iiv = document.getElementById('subjectName');
                    iiv.value='';
                    $('.waves-green').addClass('disabled');
                    $('.subList').css('display','block');
                    document.querySelector('.subList21').innerHTML = ('');
                    document.querySelector('.subList2').innerHTML = ('');
                    var text = new XMLHttpRequest();
                    text.open('POST', 'file.php', true);
                    text.onload = function() {
                        if (this.status == 200) {
                            document.querySelector('.subList1').innerHTML = (this.responseText);
                        }
                    }
                    text.send();
                } else if (returnData == 'Does Not Exist '){
                    $('.subList').css('display','block');
                    document.querySelector('.subList21').innerHTML = (' Does Not Exist In The Subject List');
                    document.querySelector('.subList2').innerHTML = ($iv);
                    var text = new XMLHttpRequest();
                    text.open('POST', 'file.php', true);
                    text.onload = function() {
                        if (this.status == 200) {
                            document.querySelector('.subList1').innerHTML = (this.responseText);
                        }
                    }
                    text.send();
                }else {
                    alert(returnData);
                }
            }
        });
    });
</script>