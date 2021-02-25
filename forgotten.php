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
            /* position:absolute; */
            top:1px !important;
            pointer-events:none;
            /* border:solid red 2px; */
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
            <div id="login_container" style="align-item:center;justify-content:center">
                <div class="row justify-content-center" style="margin:0px !important;padding:0px !important">
                    <div style="width:350px">
                        <div class="form">
                            <div class="row form-header justify-content-center" style="margin:0px !important;">
                                <img src="webimage/index.jpg" alt="" width="50vh">
                            </div>
                            <div class="teal-text accent-2 row justify-content-center" style="font-family:'Brush Script MT';font-size:39px;border-left:2px solid red;margin-left:-7px;margin-bottom:0px;">Forgotten Password</div>
                            <div class="form-body">
                            <?php
                                // mysqli_query($pcon,"UPDATE users SET password='$newpas' WHERE username='$user' AND email='$email'");
                                // $email_from='NwakanmaGallery.com';
                                // $email_subject='PassWord Retrival';
                                // $email_body='';
                                // $email_to=$email;
                                // $header='From:'. $email_from .'\r\n';
                                // mail($to);
                                $pass='C-'.round(sqrt(strrev((time() + (9999999999 + time()))+2000)))*2;
                                $msgCOntent='<img src="webimage/index.jpg" alt="claret" width="50vh">Your comfirmation is '.$pass.'. Please do not share this with anyone, proceed and set a new password';
                                echo $msgCOntent;
                            ?>
                                <form action="" method="post">
                                    <div class="input-field" style="margin-bottom:15px">
                                        <i class="prefix fa fa-user" style="font-size:20px;position:absolute;top:20px;"></i>
                                        <input type="text" name="username" class="inp">
                                        <label for="date">Enter Email</label>
                                    </div>
                                    <button class="btn distoggle disabled teal waves-effect lighten-2" name="login">retrive now</button>
                                </form>
                                <div style="margin:7px 0px">
                                    <a href="login.php" class="teal-text darken-5"  style="text-decoration:none;outline:none">Login </a>
                                </div>
                            </div>
                            <div class="form-footer">
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
        $('.inp').on('keyup', function() {
            $input1=$('.inp').val().length;
            if($input1 > 0){
                $('.distoggle').removeClass('disabled');
            }else{
                $('.distoggle').addClass('disabled');
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
    </script>
</body>
</html>