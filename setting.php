<?php $page = 'setting'; include 'menu.php'; ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
    <div class="container flow-text center ">
        <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
        Settings
        <span class="clock">
            <?php
                $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
                $timeState=mysqli_fetch_assoc($time);
                $diV=$timeState['showTime'];
                if($diV == 'checked'){
                    echo '<div class="timeStamp right"></div>';
                }
            ?>
        </span>
    </div>
</nav>
<div class="main_body" style="margin-left:280px">
    <div class="row" style="padding:20px 10%">
        <div class="col-md-4">
            <div class="flow-text">Personal Settings</div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint similique quam in optio provident possimus non suscipit praesentium corrupti mollitia quod, dignissimos accusantium rem necessitatibus ipsam illum ut cumque.
        </div>
        <div class="col-md-8" style="padding:0px;margin-bottom:6vh">
            <div class="card z-depth-2" style="padding:6px 15px">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ullam dolorem mollitia provident beatae voluptatem eos explicabo ex, nisi omnis temporibus quia incidunt impedit quos dicta architecto quisquam aspernatur asperiores?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ullam dolorem mollitia provident beatae voluptatem eos explicabo ex, nisi omnis temporibus quia incidunt impedit quos dicta architecto quisquam aspernatur asperiores?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ullam dolorem mollitia provident beatae voluptatem eos explicabo ex, nisi omnis temporibus quia incidunt impedit quos dicta architecto quisquam aspernatur asperiores?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ullam dolorem mollitia provident beatae voluptatem eos explicabo ex, nisi omnis temporibus quia incidunt impedit quos dicta architecto quisquam aspernatur asperiores?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ullam dolorem mollitia provident beatae voluptatem eos explicabo ex, nisi omnis temporibus quia incidunt impedit quos dicta architecto quisquam aspernatur asperiores?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ullam dolorem mollitia provident beatae voluptatem eos explicabo ex, nisi omnis temporibus quia incidunt impedit quos dicta architecto quisquam aspernatur asperiores?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ullam dolorem mollitia provident beatae voluptatem eos explicabo ex, nisi omnis temporibus quia incidunt impedit quos dicta architecto quisquam aspernatur asperiores?
            </div>
        </div>
        <div class="col-md-4">
            <div class="flow-text">General Settings</div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint similique quam in optio provident possimus non suscipit praesentium corrupti mollitia quod, dignissimos accusantium rem necessitatibus ipsam illum ut cumque.
        </div>
        <div class="col-md-8" style="padding:0px;margin-bottom:6vh">
            <div class="card z-depth-2" style="position:relative;padding:6px 10px">
                <div style="position:relative;">
                    Show Time
                    <div class="switch" style="float:right;position:absloute;right:13px">
                        <label>
                            Off
                            <input class="" type="checkbox" <?php
                                $username=$_SESSION['username'];
                                $check=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$username'");
                                $data=mysqli_fetch_assoc($check);
                             echo $data['showTime'];?>>
                            <span class="lever timeLever" style="margin:0px"></span>
                            On
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.timeLever').click(()=>{
        $.ajax({
            url: 'showTime.php',
        });
        $('.clock').toggle('display');
    })
</script>