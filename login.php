<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4/css/bootstrap.css">
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="fir/css/all.css">
    <link rel="icon" href="webImage/index.jpg">
    <title>Claret Academy| Login Page</title>
    <style>
        body{
            overflow:hidden !important;
        }
        .fullscreen-video{
            display: block;
            position:absolute ;
            width:100%;
        }
        .error{
            position:absolute;
            height:100vh;
            width:100%;
            top:0;
            left:0;
            background:#858b8b85; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding:0px 40%;
            z-index:10;
        }
        .errlog{
            content:'';
            border:5px solid red;
            height:80%;
            margin-top:10px !important;
            margin:0px 37px;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .errlog1,
        .errlog2 {
            content: '';
            border-top:7px solid red;
            width:120px;
            position:absolute;
        }
        .errlog1{ 
            transform: rotate(45deg);
        }
        .errlog2{ 
            transform: rotate(-45deg);
        }
        .ful{
            /* overflow:hidden; */
            position:relative;
            content:'';
            height: 100vh;
        }
        .over-lay{
            position:absolute;
            width:100vw;
            height:100vh;
            background: #0099999f;
            content:'';
            top:0;
            padding:15vh 5vw;
        }
        .form{
            background:white;
            border-radius:9px;
            padding:7px;
        }
        .input-field{
            position:relative;
            margin:0px;
            
        }
        .input-field input{
            margin:5px 40px  !important;
            padding:-10px !important;
        }
        .input-field label{
            top:1px !important;
            pointer-events:none;
        }
        .input-field input:focus + label,
        .input-field input:valid + label
        {
            top: 10px !important ;
        }
    </style>
</head>
<body>
    <div class="ful center" style="overflow:hidden">
        <div class="ful">
            <video class="change_class" src="webImage/373947032.sd.mp4" autoplay="true" loop="true"></video>
        </div>
        <div class="over-lay">
            <div id="login_container" style="">
                <div class="row justify-content-center" style="margin:0px !important;padding:0px !important">
                    <div style="width:350px">
                        <div class="form z-depth-5">
                            <div class="row form-header justify-content-center" style="margin:0px !important;">
                                <img src="webimage/index.jpg" alt="" width="50vh">
                            </div>
                            <div class="teal-text accent-2 row justify-content-center" style="font-family:'Brush Script MT';font-size:39px;border-left:2px solid red;margin-left:-7px;margin-bottom:0px;">Login Page</div>
                            <div class="form-body">
                                <form method="post">
                                    <?php
                                        session_start(); 
                                        include_once 'DBconnect.php';
                                        if(isset($_POST['login'])){
                                            $user =$_POST['username'];
                                            $password =$_POST['password'];
                                            $usertype= mysqli_query($pcon,"SELECT * FROM logindb WHERE (username='$user' OR email='$user') AND password='$password'");
                                            $usertypeExists=mysqli_num_rows($usertype);
                                            if($usertypeExists==1){
                                                $Existsdata=mysqli_fetch_assoc($usertype);
                                                $typeOf=$Existsdata['userType'];
                                                if($typeOf == 'teacher'){
                                                    $query= mysqli_query($pcon,"SELECT * FROM teacher WHERE (username='$user' OR email='$user') AND password='$password'");
                                                    $nrows=mysqli_num_rows($query);
                                                    if($nrows==1){
                                                        $data=mysqli_fetch_assoc($query);
                                                        $_SESSION['username'] = $data['username'];                                                        $_SESSION['mail'] = $data['email'];
                                                        $_SESSION['formTeacher'] = $data['formTeacher'];
                                                        $_SESSION['name']= $data['surname'].' '.$data['firstname'];
                                                        $_SESSION['userType'] = $typeOf;
                                                        header('location:index.php');
                                                    }
                                                }elseif($typeOf == 'student'){
                                                    $query= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE (username='$user' OR contactMail='$user') AND passKey='$password'");
                                                    $nrows=mysqli_num_rows($query);
                                                    if($nrows==1){
                                                        $data=mysqli_fetch_assoc($query);
                                                        $_SESSION['username'] = $data['username'];                                                        
                                                        $_SESSION['mail'] = $data['contactMail'];
                                                        $_SESSION['class'] = $data['studentCurrentClass'];
                                                        $_SESSION['studentCurrentClass'] = $data['studentCurrentClass'];
                                                        $_SESSION['userType'] = $typeOf;
                                                        $_SESSION['name']= $data['surName'].' '.$data['firstName'];
                                                        $_SESSION['full']= $data['surName'].' '.$data['firstName'].' '.$data['otherName'];
                                                        header('location:index.php');
                                                    }
                                                }elseif($typeOf == 'parent'){
                                                    $query= mysqli_query($pcon,"SELECT * FROM parentinfo WHERE (username='$user' OR maillAddress='$user') AND passKey='$password'");
                                                    $nrows=mysqli_num_rows($query);
                                                    if($nrows==1){
                                                        $data=mysqli_fetch_assoc($query);
                                                        $_SESSION['name']= $data['surName'].' '.$data['firstName'];
                                                        $_SESSION['username'] = $data['username'];                                                        $_SESSION['mail'] = $data['maillAddress'];
                                                        $_SESSION['userType'] = $typeOf;
                                                        $_SESSION['mail'] = $data['maillAddress'];
                                                        header('location:index.php');
                                                    }
                                                }else{
                                                    $query= mysqli_query($pcon,"SELECT * FROM teacher WHERE (username='$user' OR email='$user') AND password='$password'");
                                                    $nrows=mysqli_num_rows($query);
                                                    if($nrows==1){
                                                        $data=mysqli_fetch_assoc($query);
                                                        $_SESSION['name']= $data['surname'].' '.$data['firstname'];
                                                        $_SESSION['username'] = $data['username'];                                                        $_SESSION['mail'] = $data['email'];
                                                        $_SESSION['userType'] = $typeOf;
                                                        header('location:index.php');
                                                    }
                                                }
                                            }else{
                                                ?>
                                                <script></script>
                                                <div class="error">
                                                    <div class="white" style="padding:10px;border-radius:10px;z-index:10000;">
                                                        <div style="border:none;height:190px;width:230px">
                                                            <div class="errlog circle">
                                                                <div class="errlog1"></div>
                                                                <div class="errlog2"></div>
                                                            </div>
                                                            <span class="red-text lighten-2">Username Or Password Is Incorrect</span>
                                                        </div>
                                                        <div style="" class="center">
                                                            <span class="dism teal white-text waves-effect btn btn-flat">retry</span>
                                                            <a href="forgotten.php" class="teal-text darken-5" style="margin:0px 15px;outline:none">Forgotten Password </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                            }
                                        }
                                    ?>
                                    <div class="input-field">
                                        <i class="prefix fa fa-user" style="font-size:20px;position:absolute;top:20px;"></i>
                                        <input type="text" class="inp put1" name="username" style="">
                                        <label for="date">Enter Username or email</label>
                                    </div>
                                    <div class="input-field">
                                        <i class="prefix fa fa-lock" style="font-size:20px;position:absolute;top:20px;"></i>
                                        <input type="password" class="inp put2 pass" name="password">
                                        <label for="date">Enter Password</label>
                                    </div>
                                    <div class="right Show" style="display:none;padding-right:10px;">
                                        <span class="teal lighten-4" style="cursor:pointer;padding:2px 10px;border-radius:10px;"><i class="fa fa-eye"></i> Show Password</span>
                                    </div>
                                    <div class="row justify-content-left" style="margin:0px;margin-left:12px;margin-top:20px">
                                        <label style="position:relative;">
                                            <input disabled class="distogle " type="checkbox" name="">
                                            <span style="padding-left:25px">Remember me</span>
                                        </label>
                                    </div>
                                    <button class="btn teal distoggle disabled waves-effect lighten-2" name="login">login</button>
                                </form>
                                <div style="margin:7px 0px">
                                    <a href="forgotten.php" class="teal-text darken-5" style="text-decoration:none;outline:none">Forgotten Password </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/push.min.js"></script>
    <script src="bootstrap-4/js/bootstrap.js"></script>
    <script src="materialize/js/materialize.js"></script>
    <script>
        
        $(".dism").on('click',function(){
          $(".error").css('display','none');  
        })
        $('.white').fadeOut();
        $('.white').fadeIn();
        $('.white').fadeOut();
        $('.white').fadeIn();
        $('.modal').modal({
            inDuration : 200 	
        });
        $('.inp').on('keyup', function() {
            $input1=$('.put1').val().length;
            $input2=$('.put2').val().length;
            if($input1 > 0 && $input2 > 0){
                $('.distoggle').removeClass('disabled');
                $('.distogle').removeAttr('disabled');
            }else{
                $('.distoggle').addClass('disabled');
                $('.distogle').addAttr('disabled');
            }
        });
        function screenFunction(screenSize) {
            if (screenSize.matches) { 
                $('.change_class').addClass('ful');
                $('.change_class').removeClass('fullscreen-video');
            }else {
                $('.change_class').addClass('fullscreen-video');
                $('.change_class').removeClass('ful');
            }
        }
        var screenSize = window.matchMedia("(max-width: 1229px)")
        screenFunction(screenSize)
        screenSize.addListener(screenFunction);
        $('.pass').on('keyup',function(){
            if($('.pass').val().length > 0){
                $('.Show').css('display','block');
                // alert($(this).val().length);
            }else{
                $('.Show').css('display','none !important');
            }
        });
    </script>
</body>
</html>