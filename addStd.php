<?php $child = 'addstd'; $page = 'Student'; include 'menu.php' ?>
<style>
    
    input {
        cursor: pointer;
        border: 1px solid !important;
        padding-left: 11px!important;
        border-radius: 25px!important;
        border: none;
    }
    
    .input-field {
        position: relative;
        margin: 0px;
        margin-bottom: 10px!important;
    }
    
    .input-field label {
        top: 1px !important;
        pointer-events: none;
        background-color: #fff;
        margin-left: 11px;
        padding: 0px 3px;
    }
</style>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:9;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Add New Student
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
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:5px;">
    <div class="row justify-content-center">
        <div class="z-depth-3 white" style="width:1000px;margin-top:15px;padding-right:15px;border-radius:3px;">
            <img src="/webImage/index.jpg" class="center divf" style="position:absolute;width:1000px;height:200%;opacity:0.05;">
            <form method="post" enctype="multipart/form-data">
                <?php
                    if(isset($_POST['studenForm'])){
                        $surname = $_POST['surname'];
                        $firstname = $_POST['firstname'];
                        $othername = $_POST['othername'];
                        $phoneNumber = $_POST['phoneNumber'];
                        $mailAddress = $_POST['mailAddress'];
                        $DOB = $_POST['DOB'];
                        $homeAddress = $_POST['homeAddress'];
                        $DOA = $_POST['DOA'];
                        $gender = $_POST['gender'];
                        $stuUser = $_POST['stuUser'];
                        $stuPass = $_POST['stuPass'];
                        $prtUser = $_POST['prtUser'];
                        $prtPass = $_POST['prtPass'];
                        $currentClass = $_POST['currentClass'];
                        $activity = $_POST['Activity'];
                        $discipline = $_POST['discipline'];
                        $esf = $_POST['esf'];
                        $eff = $_POST['eff'];
                        $eof = $_POST['eof'];
                        $eAddress = $_POST['eAddress'];
                        $eNumber = $_POST['eNumber'];
                        $eRelationship = $_POST['eRelationship'];
                        $Eemail = $_POST['Eemail'];
                        $eJobTitle = $_POST['eJobTitle'];
                        $validImg = ['jpg', 'jpeg', 'png', 'gif', 'svg',''];
                        $temp = $_FILES['studentImage']['tmp_name'];
                        $img = $_FILES['studentImage']['name'];
                        $imgext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                        $size = $_FILES['studentImage']['size'];
                        $error = $_FILES['studentImage']['error'];
                        $imgLocation = 'studentImage/';
                        $imageNewName = $surname.$firstname.$othername.time() . '.' . $imgext;
                        $alreadyExist=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE contactMail='$mailAddress'AND firstname='$firstname' AND DOB='$DOB' AND studentCurrentClass='$currentClass'");
                        $nrow=mysqli_num_rows($alreadyExist);
                        if($nrow <= 0){
                            if(in_array($imgext, $validImg)){
                                if(move_uploaded_file($temp, $imgLocation.$imageNewName)){
                                    $register = $ocon->query("INSERT INTO studentinfo(username,passKey,surName,firstName,otherName,contactNumber,contactMail,DOB,contactAddress,DOA,gender,studentCurrentClass,ECA,studentDispline,esn,efn,eon,emergencyHomeAddress,emergencyNumber,emergencyrelationship,emergencymail,emergencyJobTitle,studentImage) VALUES('$stuUser','$stuPass','$surname','$firstname','$othername','$phoneNumber','$mailAddress','$DOB','$homeAddress','$DOA','$gender','$currentClass','$activity','$discipline','$esf','$eff','$eof','$eAddress','$eNumber','$eRelationship','$Eemail','$eJobTitle','$imageNewName')");
                                    if($register){
                                        $ocon->query("INSERT INTO logindb(username,password,email,userType)VALUES('$stuUser','$stuPass','$mailAddress','student')");
                                        $ocon->query("INSERT INTO logindb(username,password,email,userType)VALUES('$prtUser','$prtPass','$Eemail','parent')");
                                        if($prtUser != 'Already a parent'){
                                            $ocon->query("INSERT INTO parentinfo(otherName,contactNumber,jobTitle,homeAddress,surName,username,passKey,maillAddress,firstName)VALUES('$eof','$eNumber','$eJobTitle','$eAddress','$esf','$prtUser','$prtPass','$Eemail','$eff')");
                                        }
                                        ?>
                                        <div class="pulse alert alert-success pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Student has successfully been registered</div>
                                        <?php
                                    }else{
                                        unlink($imgLocation.$imageNewName);
                                    }
                                }else{
                                    $register = $ocon->query("INSERT INTO studentinfo(username,passKey,surName,firstName,otherName,contactNumber,contactMail,DOB,contactAddress,DOA,gender,studentCurrentClass,ECA,studentDispline,esn,efn,eon,emergencyHomeAddress,emergencyNumber,emergencyrelationship,emergencymail,emergencyJobTitle) VALUES('$stuUser','$stuPass','$surname','$firstname','$othername','$phoneNumber','$mailAddress','$DOB','$homeAddress','$DOA','$gender','$currentClass','$activity','$discipline','$esf','$eff','$eof','$eAddress','$eNumber','$eRelationship','$Eemail','$eJobTitle')");
                                    if($register){
                                        $ocon->query("INSERT INTO logindb(username,password,email,userType)VALUES('$stuUser','$stuPass','$mailAddress','student')");
                                        $ocon->query("INSERT INTO logindb(username,password,email,userType)VALUES('$prtUser','$prtPass','$Eemail','parent')");
                                        if($prtUser != 'Already a parent'){
                                            $ocon->query("INSERT INTO parentinfo(otherName,contactNumber,jobTitle,homeAddress,surName,username,passKey,maillAddress,firstName)VALUES('$eof','$eNumber','$eJobTitle','$eAddress','$esf','$prtUser','$prtPass','$Eemail','$eff')");
                                        }
                                        ?>
                                        <div class="pulse alert alert-success pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Student has successfully been registered</div>
                                        <?php
                                    }
                                }
                            }else{
                                ?>
                                <div class="pulse alert alert-warning pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s">
                                    <strong>Warning!</strong> Invalid Image Type
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                                <div class="pulse alert alert-warning pt-4 pb-4 " style="position:fixed;right:15px;width:250px;z-index:9;transition:3s">
                                    <strong>Warning!</strong> Seems like This Student Already Exists 
                                </div>
                            <?php
                        }
                    }
                ?>
                <h3 class="flow-text center">Student Registration Form</h3>
                <div class="row">
                    <div class="col-md-12" style="position:;">
                        <div id="login_container">
                            <div class="row justify-content-center right" style="margin:0px !important;padding:0px !important">
                                <div style="width:200px">
                                    <div class="wrongImg red-text" style="display:none">* file selected is not a supported</div>
                                    <div class="card" style="height:230px;box-shadow:0px 0px 0px;border:none">
                                    <div class="circle" id="studentImageContainer" style="height:100%;width:200px">
                                        <img src="/avatars/4.png" class="circle imgF z-depth-4" style="height:90%;width:200px;z-index:0;" alt="Add Image">
                                    </div>
                                    <input type="file" name="studentImage" id="studentFile" onChange="return img()" style="display:none">
                                        <span class="z-depth-3 studentFileBtn btn white-text  pb-5 pl-2 pr-2" style="border-radius:50%;border:3px solid #fff;position:absolute;bottom:30px;right:18px;z-index:3;font-size:40px;font-weight:bolder">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <input required type="text" name="surname">
                            <label for="date">Enter Surname</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <input required type="text" name="firstname">
                            <label for="date">Enter Fristname</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <input type="text" name="othername">
                            <label for="date">Enter Othername</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <input required type="number" name="phoneNumber">
                            <label for="date">Enter Phone Number</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="input-field">
                            <input type="email" name="mailAddress">
                            <label for="date">Enter mail Address</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-field">
                            <input required type="date" name="DOB">
                            <label for="date">Enter Date Of Birth</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-field">
                            <input required type="text" name="homeAddress">
                            <label for="date">Enter Home Address</label>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-top:0px">
                        <div class="">Gender</div>
                        <p>
                            <label>
                                <input required type="radio" value="male" name="gender" class="with-gap">
                                <span>Male</span>
                            </label>
                            <label>
                                <input required type="radio" value="female" name="gender" class="with-gap">
                                <span>Female</span>
                            </label>
                        </p>
                    </div>
                </div>
                <h3 class="flow-text center">Student Academic informations</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-field">
                            <select name="currentClass">
                                <option selected disabled>Select Student Class</option>
                                <option value="jss1">JSS 1</option>
                                <option value="jss2">JSS 2</option>
                                <option value="jss2">JSS 3</option>
                                <option value="sss1">SSS 1</option>
                                <option value="sss2">SSS 2</option>
                                <option value="sss3">SSS 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="text" name="Activity">
                            <label for="date">Enter Extarcurricular Activity</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="date" name="DOA">
                            <label for="date">Date Of Admission</label>
                        </div>
                    </div>
                    <div class="col-md-5" style="padding-top:0px">
                        <div class="center">Discipline</div>
                        <p>
                            <label>
                                <input required type="radio" value="art" name="discipline" class="with-gap">
                                <span>Art Student</span>
                            </label>
                            <label>
                                <input required type="radio" value="science" name="discipline" class="with-gap">
                                <span>Science Student</span>
                            </label>
                            <label>
                                <input required type="radio" value="nothing" name="discipline" class="with-gap">
                                <span>Yet To Decide</span>
                            </label>
                        </p>
                    </div>
                </div>
                <h3 class="flow-text center">Student Emergency contact details</h3>
                <div class="row" style="margin:0px">
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="text" name="esf">
                            <label for="date">Enter Surname</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="text" name="eff">
                            <label for="date">Enter Fristname</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="text" name="eof">
                            <label for="date">Enter Othername</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-field">
                            <input required type="text" name="eAddress">
                            <label for="date">Enter Home Address</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <input required type="number" name="eNumber">
                            <label for="date">Enter Phone Number</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-field">
                            <input required type="text" name="eRelationship">
                            <label for="date">Enter Relationship</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="input-field">
                            <input type="email" name="Eemail">
                            <label for="date">Enter email</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-field">
                            <input type="text" name="eJobTitle">
                            <label for="date">Enter Job Title</label>
                        </div>
                    </div>
                </div>
                <h3 class="flow-text center">Students Login Infomation</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="text" class="stuUser" name="stuUser">
                            <label for="date">Enter Username</label>
                        </div>
                        <span class="red-text pl-2 alreadyStud" style="display:none;position:absolute"> * Username already exists</span>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="password" name="stuPass">
                            <label for="date">Enter Password</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="password">
                            <label>Comfirm Password</label>
                        </div>
                    </div>
                </div>
                <h3 class="flow-text center">Parent Login Infomation</h3>
                <label class="ml-4 mb-3">
                    <input type="checkbox" class="Alreadypart"/>
                    <span>Already a parent</span>
                </label>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="text" class="prtUser" name="prtUser">
                            <label for="date">Enter Username</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="password" class="prtPass" name="prtPass">
                            <label for="date">Enter Password</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input required type="password" class="prtPass">
                            <label>Comfirm Password</label>
                        </div>
                    </div>
                </div>
                <!-- <h3 class="flow-text center">Students Medical Report</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-field">
                            <input type="text" name="bloofG">
                            <label for="date">Enter Blood Group</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <select name="allege">
                                <option value="hjg" selected disabled>Enter Allergy</option>
                                <option value="hjg">1</option>
                                <option value="hjg">1</option>
                                <option value="hjg">1</option>
                                <option value="hjg">1</option>
                                <option value="hjg">j</option>
                                <option value="other">other ...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-field">
                            <input type="text" name="genotype">
                            <label for="date">Enter Genotype</label>
                        </div>
                    </div> -->
                    <div class="row justify-content-center">
                        <button type="submit" name="studenForm" class="btn center white-text btn-lg green waves-effect lighten-2 z-depth-3">Add Student</button>
                    </div>
                <!-- </div> -->
            </form>
        </div>
    </div>
</div>
<script>
    setInterval(() => {
        $('.alert').css('margin-right','-3000px')
        }
    , 5000);
    function img(){
        var file = document.getElementById('studentFile');
        var filePath =file.value;
        var allowedType = /(\.jpg|\.jpeg|\.png|\.gif|\.svg)$/i;
        if(!allowedType.exec(filePath)){
            $('.wrongImg').css('display','block');
            file.value = '';
            return false;
        }else{
            if(file.files && file.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    document.getElementById('studentImageContainer').innerHTML='<img src="'+e.target.result+'" class="circle z-depth-4" style="height:90%;width:200px;z-index:0;">';
                    $('.imgF').css('display','none');
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
    }
    $('.Alreadypart').on('change',function(){
        state = $(this).val();
        if (state == "on") {
            $('.prtUser').attr('value', 'Already a parent');
            $('.prtPass').attr('value', 'Already a parent');
            $('.Alreadypart').val()='off';
        } else {
            $(this).val()='on';
            $('.prtUser').val()='';
            $('.prtPass').val()='';
        }
    });
    $('.stuUser').on('keyup',function(){
        $stuUser=$(this).val();
        $.ajax({
            type: 'get',
            url: 'stuUser.php',
            data: { 'stuUser': $stuUser },
            cache: false,
            success: function(returnData) {
                if(returnData == 'exist'){
                    $('.alreadyStud').css('display','block');
                }else{
                    $('.alreadyStud').css('display','none');
                }
            }
        });
    })
</script>