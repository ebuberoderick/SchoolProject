<?php $child = 'msgPrt'; $page = 'message'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:9;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Message Parent
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
<span class="btn-floating btn-large dnap waves-effect waves-indigo z-depth-4" style="position:fixed;bottom:15px;right:15px;"><i class="fa fa-dna"></i></span>
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:0px !important">
    <div class="white" style="">
        <div class="row" style="position:sticky;top:0px;">
            <div class="col-9" style="padding:2px 15px">
                <div class="nav-wrapper" style="">
                    <form>
                        <div class="input-field teal lighten-4" style="height:45px;border-radius:30px;">
                            <input id="search" style="border:1px solid gray;border-radius:30px;height:44px" type="search">
                            <label class="label-icon" for="search"><i class="fa fa-search" style="font-size:15px;position:relative;top:8px"></i></label>
                            <i class="material-icons"><i class="fa fa-times" style="font-size:15px;position:relative;bottom:8px"></i></i>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2">
                <span class="btn-floating btn-large" style="margin-top:7px;z-index:0"><i class="fa fa-bullhorn"></i></span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-bottom:0px;height:40%;overflow-y:hidden;margin-top:-20px;">
        <div class="col-md-8 divf" style="padding:12px 2% !important">
            <div style="font-weight:bold;padding-left:5px"> All Parents</div>
            <?php
                if($_SESSION['userType'] == 'teacher'){
                    ?>
                        <div class="teacherMessageParent"></div>
                        <script>
                            function fetchlist21() {
                                $.ajax({
                                    url: 'teacherMessageParent.php',
                                    success: function(returnData) {
                                        $('.teacherMessageParent').html(returnData);
                                    }
                                });
                            }
                            fetchlist21();
                            setInterval(() => {
                                fetchlist21();
                            }, 5000);
                        </script>
                    <?php
                }elseif($_SESSION['userType'] == 'student'){
                  
                }elseif($_SESSION['userType'] == 'parent'){
                  
                }else{
                    ?>
                        <div class="adminMessageParent"></div>
                        <script>
                            function fetchlist21() {
                                $.ajax({
                                    url: 'adminMessageParent.php',
                                    success: function(returnData) {
                                        $('.adminMessageParent').html(returnData);
                                    }
                                });
                            }
                            fetchlist21();
                            setInterval(() => {
                                fetchlist21();
                            }, 5000);
                        </script>
                    <?php
                }
            ?>   
        </div>
        <div class="col-md-4 divs" style="overflow-y:scroll;overflow-x:hidden;height:100%">
            <div class="" style="padding-bottom:10px">
                <div style="padding-top:10px;">
                    <div style="font-weight:bold;padding-left:5px"> My Parents</div>
                    <div class="white z-depth-3" style="border-radius:19px 0px 0px 19px;">
                        <div class="row parentImg">
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider1.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider2.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider3.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider4.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider5.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider6.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider7.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider8.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider9.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                            <div class="col-4" style="padding:10px">
                                <img class="img-fluid rounded-circle" style="height:60px;width:60px;z-index:-1" src="/webImage/slider10.jpg" alt="" srcset="">
                                <div class="truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt eveniet ea perferendis nulla rerum in voluptas dignissimos deleniti odit culpa dolore iste nam, voluptatem temporibus voluptate iusto repellendus facere fuga!</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div style="padding-top:10px;">
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