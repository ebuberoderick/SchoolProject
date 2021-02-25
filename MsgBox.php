<?php $child = ''; $page = 'message'; include 'menu.php';
$name=$_SESSION['username'];
$sedMail=$_SESSION['mail'];
$stdinfo=$_GET['mail'];
$chekMess=mysqli_query($pcon,"SELECT * FROM logindb WHERE email='$stdinfo'");
$chekMessType=mysqli_fetch_array($chekMess);
if($chekMessType['userType']=='student'){
    $getStudent=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE contactMail='$stdinfo'");
    $checkstudent=mysqli_fetch_array($getStudent);
    $fullName = $checkstudent[1].' '.$checkstudent[2].' '.$checkstudent[3];
}elseif ($chekMessType['userType']=='parent'){
    $getStudent=mysqli_query($pcon,"SELECT * FROM parentinfo WHERE maillAddress='$stdinfo'");
    $checkstudent=mysqli_fetch_array($getStudent);
    $fullName = $checkstudent[3].' '.$checkstudent[4].' '.$checkstudent[5];
}else{
    $getStudent=mysqli_query($pcon,"SELECT * FROM teacher WHERE email='$stdinfo'");
    $checkstudent=mysqli_fetch_array($getStudent);
    $fullName = $checkstudent[6].' '.$checkstudent[4].' '.$checkstudent[5];
}
?>
<input type="hidden" class="sender" value="<?php echo $sedMail?>">
<input type="hidden" class="reci" value="<?php echo $stdinfo?>">
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:0px;position:sticky;top:0">
<div class="row m-0 p-0" style="">
    <div class="col-md-8 p-0" style="">
        <div class="card m-0 p-0" style="height:100vh;width:auto;border-radius:0px;top:0">
            <div class="card-header white z-depth-2" style="background:#f7f7f7;padding:5px;text-transform:capitalize">
                <div class="input-group" style="width:100%;vertical-align: bottom !important;">
                    <div class="input-group-prepend" style="">
                        <i class="fa fa-arrow-left back teal-text" style="float:left;position:relative;top:12px;margin-right:5px;cursor:pointer"></i>
                        <?php
                        if($chekMessType['userType']=='student'){
                            ?>
                                <img  src="/studentImage/<?php echo $checkstudent[4]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="width:44px;height:44px;border:0px solid;float:left;margin-right:4px;" alt="Profile image">
                            <?php
                        }elseif ($chekMessType['userType']=='parent'){
                            ?>
                                <img  src="/parentImage/<?php echo $checkstudent[10]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="width:44px;height:44px;border:0px solid;float:left;margin-right:4px;" alt="Profile image">
                            <?php
                        }else{
                            ?>
                                <img  src="/teacherImage/<?php echo $checkstudent[9]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="width:44px;height:44px;border:0px solid;float:left;margin-right:4px;" alt="Profile image">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-control" style="background:transparent;padding:0px;border:none;height:auto;display:flex;align-items: center;">         
                        <div class="ml-1" style="font-size:20px;font-weight:bold;"><?php echo $fullName ?></div>
                    </div>
                </div>
            </div>
            <div class="card-body" id="scroller" style="padding:1%;overflow-y:scroll;height:80%">
                <div class="chatBox"></div>
                <div style="display:none">
                    <?php
                        if($chekMessType['userType']=='student'){
                            ?>
                                <img  src="/studentImage/<?php echo $checkstudent[4]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="position:relative;bottom:30px;z-index:1;width:15px;height:15px;align-self:end;margin-bottom:-19px" alt="Profile image">
                            <?php
                        }elseif ($chekMessType['userType']=='parent'){
                            ?>
                                <img  src="/parentImage/<?php echo $checkstudent[10]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="position:relative;bottom:30px;z-index:1;width:15px;height:15px;align-self:end;margin-bottom:-19px" alt="Profile image">
                            <?php
                        }else{
                            ?>
                                <img  src="/teacherImage/<?php echo $checkstudent[9]?>" class="img-fluid showpic rounded-circle" alt="NYC" style="position:relative;bottom:30px;z-index:1;width:15px;height:15px;align-self:end;margin-bottom:-19px" alt="Profile image">
                            <?php
                        }
                    ?>
                    <div class="grey z-depth-2 lighten-3 pl-3 pr-3 pt-3 pb-3 ml-2" style="margin-top: -10px;display:inline-block;transform: rotate(90deg);border-radius:9px 9px 0px 9px;">
                        <div class="typ typ1 teal"></div>
                        <div class="typ typ2 teal"></div>
                        <div class="typ typ3 teal"></div>
                    </div>
                </div>
                <a name="bot"></a>
                <a href="#bot" class="tpen" style="display:none;position:sticky;bottom:5px;float:right;background:#6c757d;margin-right:4px;padding:5px 11px;color:#fff;border-radius:50%;">
                    <button class="pen" style="display:none !important;"></button>
                    <i class="fa fa-angle-double-down"></i>
                </a>
            </div>
            <div class="card-footer" style="padding:5px;background:transparent;border:none;min-height:30px">
                <form class="form-inline" style="margin:0px;padding:0px 5px">
                    <div class="input-group" style="vertical-align: bottom;width:100%;vertical-align: bottom !important;">
                        <div class="form-control" style="background:transparent;padding:0px;border:none;height:auto;">
                            <div class="" style="border-radius:9px 9px 9px 0px;background:#dddddd;margin:0px;border-radius:9px 9px 0px 9px">
                                <span id="j" style="float:right;cursor:pointer;margin-right:9px;"></span>
                                <div id="repct" style="border-right: 3px solid #627bbe;background:#6d88d391;padding:0px 5px">
                                </div>
                            </div>
                            <input type="hidden" id="replyArea" value="">
                            <textarea name="textArea" id="textArea" style="margin:0px;width:100%;" rows="1"></textarea>
                        </div>
                        <div class="input-group-prepend teal ml-1 pl-1" style="cursor:pointer;height:20px;align-self:center;height:40px;border-radius:30px;width:40px;justify-content:center;align-items:center;">
                            <span class="input-group-text sendMsg" style="background:transparent;border:none;padding:0px 5px;"><i class="material-icons white-text" style="font-size:25px">send</i></span>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
    <div class="col-md-4 p-0 hide-on-small-and-down">
        <div class="card m-0 p-0" style="background-color:transparent;height:100vh;width:auto;border-radius:0px;over-flow:hidden">
            <div class="card-body" id="gscroller" style="padding:0px;overflow-y:scroll;">
                <div class="card-body" style="padding-bottom:10px">
                    <div style="padding-top:10px;">
                        <?php
                            $deDal=mysqli_query($pcon,"SELECT * FROM logindb WHERE email='$stdinfo'");
                            $tyChat =mysqli_fetch_array($deDal);
                            if($tyChat['userType'] == 'teacher'){
                                echo '<div style="font-weight:bold;padding-left:5px"> My Teachers</div>';  
                            }elseif($tyChat['userType'] == 'student'){
                                echo '<div style="font-weight:bold;padding-left:5px"> My Students</div>';
                            }elseif($tyChat['userType'] == 'parent'){
                                echo '<div style="font-weight:bold;padding-left:5px"> My Parents</div>';
                            }else{
                                echo '<div style="font-weight:bold;padding-left:5px"> My Teachers</div>';  
                            }
                        ?>
                        <div class="white z-depth-3" style="border-radius:19px 0px 0px 19px;">
                            <div class="row parentImg">
                                <?php
                                    $tyChat =mysqli_fetch_array(mysqli_query($pcon,"SELECT * FROM logindb WHERE email='$stdinfo'"));
                                    if($tyChat[4] == 'teacher'){
                                        $getStudentr=mysqli_query($pcon,"SELECT * FROM teacher WHERE username!='$name'");
                                        while($checkstudentr=mysqli_fetch_array($getStudentr)){
                                            $fullNamer = $checkstudentr[1];
                                            ?>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/teacherImage/<?php echo $checkstudentr[9]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/teacherImage/<?php echo $checkstudentr[9]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/teacherImage/<?php echo $checkstudentr[9]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                            <?php
                                        }
                                    }elseif($tyChat[4] == 'student'){
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
                                    }elseif($tyChat[4] == 'parent'){
                                        $getStudentr=mysqli_query($pcon,"SELECT * FROM parentinfo");
                                        while($checkstudentr=mysqli_fetch_array($getStudentr)){
                                            $fullNamer = $checkstudentr[3];
                                            ?>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/parentImage/<?php echo $checkstudentr[10]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/parentImage/<?php echo $checkstudentr[10]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/parentImage/<?php echo $checkstudentr[10]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                            <?php
                                        }
                                    }else{
                                       $getStudentr=mysqli_query($pcon,"SELECT * FROM teacher WHERE username!='$name'");
                                        while($checkstudentr=mysqli_fetch_array($getStudentr)){
                                            $fullNamer = $checkstudentr[1];
                                            ?>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/teacherImage/<?php echo $checkstudentr[9]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/teacherImage/<?php echo $checkstudentr[9]?>" alt="<?php echo $fullNamer?>" srcset="">
                                                    <div class="truncate"><?php echo $fullNamer?></div>
                                                </div>
                                                <div class="col-4" style="padding:10px">
                                                    <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1"  src="/teacherImage/<?php echo $checkstudentr[9]?>" alt="<?php echo $fullNamer?>" srcset="">
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
                            <?php
                                $tyChat =mysqli_fetch_array(mysqli_query($pcon,"SELECT * FROM logindb WHERE email='$stdinfo'"));
                                if($tyChat[4] == 'teacher'){
                                    ?>
                                        <div style="font-weight:bold;padding-left:5px">Active Teacher(s)</div>
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
                                            </ul> 
                                        </div>
                                    <?php
                                }elseif($tyChat[4] == 'student'){
                                    ?>
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
                                            </ul> 
                                        </div>
                                    <?php
                                }elseif($tyChat[4] == 'parent'){
                                    ?>
                                        <div style="font-weight:bold;padding-left:5px">Active Parent(s)</div>
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
                                            </ul> 
                                        </div>
                                    <?php
                                }else{
                                    ?>
                                        <div style="font-weight:bold;padding-left:5px">Active Teacher(s)</div>
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
                                            </ul> 
                                        </div>
                                    <?php
                                }
                            ?>
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
</div>
</div>
<script>
var eel =$('#textArea').emojioneArea({
    placeholder: "Type message here . . .",
    shortnames: true,
    attributes: {
        spellcheck : true,
        autocomplete   : "on",
    }
});
$('.emojionearea-editor').on('click',function(){
    alert('dk');
})
var autoScroll = false;
var firstload = true;
const msgContainer = document.querySelector('#scroller');
$('.sendMsg').on('click', function() {
    $msg=eel[0].emojioneArea.getText();
    $sender=$('.sender').val();
    $reci=$('.reci').val();
    if($msg!==''){
        $.ajax({
            type:'get',
            url: 'sendMsg.php',
            data: { 'msg': $msg ,'sender':$sender, 'reci':$reci},
            cache: false,
            beforeSend: function () {
                autoScroll = true;
            },
            success: function(retData) {
                if(retData=='done'){
                    eel[0].emojioneArea.setText(''); 
                }
            }
        }); 
    }
});

msgContainer.addEventListener('scroll', function(){
    if((msgContainer.scrollTop + msgContainer.clientHeight)  <= (msgContainer.scrollHeight - 15)){
        autoScroll = false;
        $('.tpen').css('display','block');
    }else{
        $sender=$('.sender').val();
        $reci=$('.reci').val();
        autoScroll = true;
        $('.tpen').css('display','none');
        $.ajax({
            type: 'get',
            url: 'chatBox.php',
            data: {'sender':$sender, 'reci':$reci},
            cache :false,
            success: function(returnData){
                $('.chatBox').html(returnData); 
                if(firstload == true){
                    msgContainer.scrollTop = msgContainer.scrollHeight;
                    firstload = false;
                }else{
                    if(autoScroll == true){
                        msgContainer.scrollTop = msgContainer.scrollHeight;
                    }
                }
            }
        });
    }
});
function fetchMsg(){
    $sender=$('.sender').val();
    $reci=$('.reci').val();
    $.ajax({
        type: 'get',
        url: 'chatBox.php',
        data: {'sender':$sender, 'reci':$reci},
        cache :false,
        success: function(returnData){ 
            $('.chatBox').html(returnData); 
            if(firstload == true){
                msgContainer.scrollTop = msgContainer.scrollHeight;
                firstload = false;
            }else{
                if(autoScroll == true){
                    msgContainer.scrollTop = msgContainer.scrollHeight;
                }
            }
        },
        error: function (xhr, status, message) {
            console.log(message);
        }
    });
}
fetchMsg();
setInterval(() => {
    fetchMsg();
}, 300);
$('.back').on('click', function() {
    window.history.back();
});
</script>