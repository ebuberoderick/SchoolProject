<?php $page = 'index'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
  <div class="container flow-text center ">
  <a href="#" data-target="slide-out" class="sidenav-trigger"></a>
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    Dashborad
    <?php
      if($_SESSION['userType'] == 'teacher'){
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }elseif($_SESSION['userType'] == 'student'){
        $time=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }elseif($_SESSION['userType'] == 'parent'){
        $time=mysqli_query($pcon,"SELECT * FROM parentinfo WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }else{
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
      }
    ?>
  </div>
</nav>
<div class="main_body" style="margin-left:280px;overflow-x:hidden">
  <div class="row">
    <div class="col-md-8" style="">
      <div class="pt-3 mb-3" style="width:100%;">
        <?php
            if($_SESSION['userType']=='teacher'){
              $showChart=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$name'");
              $showChartState = mysqli_fetch_assoc($showChart);
              if($showChartState['formTeacher'] !=''){
                ?>
                  <canvas class="white z-depth-2" id="canvas"></canvas>
                  <script>
                    var ctx = document.getElementById('canvas').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                            datasets: [{
                                backgroundColor: 'rgba(126, 228, 228, 0.74)',
                                borderColor: 'rgba(126, 228, 228, 0.74)',
                                data: [],
                                pointRadius: 3,
                            }]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false,
                            },
                            title: {
                                display: true,
                                text: "Student's Attendance Record For Last Week"
                            },
                            scales: {
                                x: {
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Day's Of The Week"
                                    }
                                },
                                y: {
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: "Number Of Student's"
                                    }
                                }
                            }
                        }
                    });
                  </script>
                <?php
              }
            }elseif($_SESSION['userType']=='student'){
              ?>
                <canvas class="white z-depth-2" id="studentcanvas"></canvas>
              <?php
            }elseif($_SESSION['userType']=='parent'){
              ?>
                <canvas class="white z-depth-2" id="parentCanvas"></canvas>
                
              <?php
            }else{
              ?>
                <div class="row">
                  <div class="col-md-4 pt-3">
                    <a class="btn pulse white-text modal-trigger z-depth-3 waves-effect" style="z-index:0" href="#update">update system</a>
                  </div>
                  <div class="col-md-6 pt-3">
                    <a class="btn pulse blue white-text modal-trigger z-depth-3 waves-effect" style="z-index:0;" href="#teachersAttd">take teachers attendence</a>
                  </div>
                </div>
                <div id="teachersAttd" class="modal update mt-5 center" style="height:250px;max-width:350px">
                  <div class=" pt-4" style="height:100%">
                    <form method="post">
                      <?php
                        $currWe= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
                        $numWeekw = mysqli_fetch_array($currWe);	
                        $thisWeekw = $numWeekw['currDay'];
                        $thisDayw = $numWeekw['week'];
                        $thisSectionw = $numWeekw['academicSection'];
                        $thisTermw = $numWeekw['academicTerm'];
                        if(isset($_POST['teachersAttend'])){
                          $sectionAttd=$thisSectionw;
                          $termAttd=$thisTermw;
                          $dayAtd=$thisDayw;
                          $weekAttd=$thisWeekw;
                          $teacher=$_POST['teacherNameo'];
                          $attTaken = $ocon->query("INSERT INTO teachersattd(sectionAttd,termAttd,dayAtd,timeAttd,weekAttd,teacher)VALUE('$sectionAttd','$termAttd','$dayAtd',current_timestamp(),'$weekAttd','$teacher')");
                          if($attTaken){
                            ?>
                              <script>
                              setInterval(() => {
                                  $('.alert').css('margin-right','-3000px')
                                  }
                              , 5000);
                              $('.showAlert').html=('<div class="pulse alert alert-success pt-4 pb-4 " style="position:absolute;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Update was Successful</div>');
                              </script>
                            <?php 
                          }
                        }
                      ?>
                      <div class="row">
                        <div class="col-md-12 mb-5">
                          <div class="input-field">
                            <select name="teacherNameo" class="stuadtd">
                              <option value="" disabled selected>Select a teacher</option>
                              <?php
                                  $getMyteacherssSelect = mysqli_query($pcon,"SELECT * FROM teacher WHERE formTeacher!='admin'");
                                  $nStdsSelect=mysqli_num_rows($getMyteacherssSelect);
                                  if($nStdsSelect > 0){
                                      while ($teachersSelect = mysqli_fetch_array($getMyteacherssSelect)){
                                          $fullname =$teachersSelect['surname'].' '.$teachersSelect['firstname'].' '.$teachersSelect['lastname'];
                                          $alreadyTaken = mysqli_num_rows(mysqli_query($pcon,"SELECT * FROM teachersattd WHERE teacher='$fullname' AND weekAttd='$thisWeekw' AND dayAtd='$thisDayw' AND termAttd='$thisTermw' AND sectionAttd='$thisSectionw'"));
                                          if(!$alreadyTaken){
                                              ?>
                                              <option value="<?php echo $fullname?>" data-icon="/teacherImage/<?php echo $teachersSelect['photo']?>"><?php echo $fullname?></option>
                                              <?php
                                          }
                                      }
                                  }else{
                                      ?>
                                          <option value="">No Teacher yet !</option>
                                      <?php
                                  }
                              ?>
                            </select>
                          </div>
                          <button class="btn mt-5 white-text" name="teachersAttend">take attendance</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div id="update" class="modal update mt-5 center" style="height:100vh;max-width:350px">
                  <div class=" pt-4" style="height:100%">
                    <form method="post">
                      <?php
                        if(isset($_POST['update'])){
                          $updateSection=$_POST['section'];
                          $updateWeek=$_POST['day'];
                          $updateDay=$_POST['week'];
                          $updateterm=$_POST['term'];
                          $exec_query = mysqli_query($pcon,"UPDATE attendence SET academicTerm='$updateterm',academicSection='$updateSection',week='$updateWeek',currDay='$updateDay' WHERE studentFullName='numberschoolweek'");
                          if($exec_query){
                            ?>
                              <script>
                              setInterval(() => {
                                  $('.alert').css('margin-right','-3000px')
                                  }
                              , 5000);
                              $('.showAlert').html=('<div class="pulse alert alert-success pt-4 pb-4 " style="position:absolute;right:15px;width:250px;z-index:9;transition:3s"><strong>Success!</strong> Update was Successful</div>');
                              </script>
                              
                            <?php 
                          }
                        }
                      ?>
                      <div class="row">
                        <div class="col-md-12">
                          <h5 class="mb-5">Open For Today</h5>
                          <div class="col-md-12">
                            <div class="input-field">
                              <?php
                                $info=mysqli_fetch_array(mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'"));
                                $infow = $info[1];
                                ?>
                                <input required name='section' type="text"  value="<?php echo $infow; ?>">
                              <label style="pointer-events:none;">Enter Current Section</label>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="input-field">
                              <select required name="term">
                                <option selected disabled>Choose Term</option>
                                <option value="1">First Term</option>
                                <option value="2">Second Term</option>
                                <option value="3">Third Term</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="input-field">
                              <select name="day">
                                <option value="hjg" selected disabled>Choose Day</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12 mb-5">
                            <div class="input-field">
                              <select required name="week">
                                <option value="hjg" selected disabled>Choose Current Week</option>
                                <?php
                                  $a=0;
                                  while ($a < $info[5]) {
                                    $a++;
                                    ?>
                                      <option value="<?php echo $a;?>">Week <?php echo $a;?></option>
                                    <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                          <button class="btn mt-5" name="update">Update Now</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <script>
                  $('.update').modal({});
                  $('.teachersAttd').modal({});
                </script>
                <div class="">
                  <h3 class="flow-text center">Teacher's Attendance For Today</h3>
                  <div class="table-responsive table_div p-0" style="max-height:400px">
                    <table class="table teal table-bordered white table-striped" style="position:sticky;top:0;margin:0px;">
                      <tr class="teal">
                        <th class="center p-2">NO.</th>
                        <th class="center" style="width:1000px;padding:2px 45px">Teachers Name</th>
                        <th class="center" style="width:100px;padding:2px 35px">Time</th>
                      </tr>
                    </table>
                    <?php
                      
                      $teachers= mysqli_query($pcon,"SELECT * FROM teachersattd WHERE weekAttd='$thisWeekw' AND sectionAttd='$thisSectionw' AND	termAttd='$thisTermw' AND	dayAtd='$thisDayw' ORDER BY timeAttd");
                      $numberOfTeachers=mysqli_num_rows($teachers);
                      if($numberOfTeachers > 0){
                        $position=0;
                        while($teachersPresent=mysqli_fetch_array($teachers)){
                          $position++
                          ?>
                            <table class="table table-bordered <?php if($teachersPresent[4] > '07:30:00'){echo 'red lighten-4';}else{ echo 'white';} ?> z-depth-2" style="border-radius:10px;margin:0px;margin-bottom:4px">
                              <tr style="border-radius:10px">
                                <th class="center"><?php echo $position;?>.</th>
                                <th style="width:1000px;"><?php echo $teachersPresent[6] ?></th>
                                <th style="width:100px;padding:2px 22px"><?php echo $teachersPresent[4]?></th>
                              </tr>
                            </table>
                          <?php
                        }
                      }else{
                        ?>
                          <table class="table table-bordered white" style="margin:0px;margin-bottom:4px">
                            <tr class="">
                              <th>No Teacher Is Present Yet</th>
                            </tr>
                          </table>
                        <?php
                      }
                    ?>
                    
                  </div>
                </div>
              <?php
            };
        ?>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card image_card z-depth-3" style="cursor: pointer;background-image:url(webImage/bk.png)">
            <div class="z-depth-2-text" style="font-size:5rem;font-weight:bold;">
              <?php 
                $numberschoolweek= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='numberschoolweek'");
                $numWeek = mysqli_fetch_array($numberschoolweek);
                $thisWeek = $numWeek['currDay'];
                echo $thisWeek;
              ?>
            </div>
            <div style="margin-top:37px">School Academic Week</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card image_card z-depth-3" style="cursor: pointer;background-image:url(webImage/bck.png)">
            <div class="z-depth-2-text" style="font-size:5rem;font-weight:bold;">
              <?php
                if($_SESSION['userType'] == 'teacher'){
                  ?>
                    <canvas id="today"></canvas>
                  <?php
                }elseif($_SESSION['userType'] == 'student'){
                  $fTidel=mysqli_query($pcon,"SELECT * FROM studentinfo WHERE username='$name'");
                  $fTiD = mysqli_fetch_assoc($fTidel);
                  $me=$fTiD['surName'].' '.$fTiD['firstName'].' '.$fTiD['otherName'];
                  $currDay=$numWeek['currDay'];
                  $academicTerm=$numWeek['academicTerm'];
                  $academicSection=$numWeek['academicSection'];
                  $Week=$numWeek['week'];
                  $today= mysqli_query($pcon,"SELECT * FROM attendence WHERE studentFullName='$me' AND currDay='$Week' AND week='$currDay' AND	academicTerm='$academicTerm' AND	academicSection='$academicSection'");
                  $persent = mysqli_num_rows($today);
                  if($persent){
                    ?>
                      <i class="material-icons teal-text" style="font-size:6vw">done_all</i>
                      <span></span>
                    <?php
                  }else{
                    ?>
                      <i class="material-icons red-text" style="font-size:6vw">radio_button_checked</i>
                      <span></span>
                    <?php
                  }
                }elseif($_SESSION['userType'] == 'parent'){
                  ?>
                    <canvas id="today2"></canvas>
                  <?php
                }else{
                  echo mysqli_num_rows(mysqli_query($pcon,"SELECT * FROM studentinfo"));
                }
              ?>
            </div>
            <?php
              if($_SESSION['userType'] !='admin' || 'princepal'){
                ?>
                  <div style="margin-top:35px">Total Numbers Of Students</div>
                <?php
              }else{
                ?>
                  <div style="margin-top:35px">Today's Attendance</div>
                <?php
              }
            ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card image_card z-depth-3" style="cursor: pointer;background-image:url(webImage/back.png)">
            <div class="z-depth-2-text" style="font-size:5rem;font-weight:bold;">
              <?php 
                if($_SESSION['userType'] == 'teacher'){
                  $myClass = $_SESSION['formTeacher'];
                  $getMyStudents= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE studentCurrentClass='$myClass'");
                  $nStds=mysqli_num_rows($getMyStudents); echo $nStds;
                }elseif($_SESSION['userType'] == 'student'){
                  $myClass =$fTiD['studentCurrentClass'];
                  $getMyStudents= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE studentCurrentClass='$myClass'");
                  $nStds=mysqli_num_rows($getMyStudents); echo $nStds;
                }elseif($_SESSION['userType'] == 'parent'){
                  $part=$_SESSION['username'];
                  $getMyP= mysqli_query($pcon,"SELECT * FROM parentinfo WHERE username='$part'");
                  $partD=mysqli_fetch_array($getMyP);
                  $fName=$partD['firstName'];
                  $sName=$partD['surName'];
                  $oName=$partD['otherName'];
                  $getMyStudents= mysqli_query($pcon,"SELECT * FROM studentinfo WHERE efn='$fName' AND esn='$sName' AND eon='$oName'");
                  $nStds=mysqli_num_rows($getMyStudents); echo $nStds;
                }else{
                  $getMyP= mysqli_query($pcon,"SELECT * FROM teacher");
                  $partD=mysqli_num_rows($getMyP);
                  echo $partD-1;
                }
              ?>
            </div>
            <?php 
                if($_SESSION['userType'] == 'teacher'){
                  echo '<div style="margin-top:37px">Total Number Of Students</div>';
                }elseif($_SESSION['userType'] == 'student'){
                  echo '<div style="margin-top:37px">Total Number Of Students</div>';
                }elseif($_SESSION['userType'] == 'parent'){
                  echo '<div style="margin-top:37px">Total Number Of ward(s)</div>';
                }else{
                  echo '<div style="margin-top:37px">Total Number Of teacher(s)</div>';
                }
              ?>
            
          </div>
        </div>
      </div>
      <div class="table-responsive-md">
        <h3 class="flow-text center">School Upcoming Event's</h3>
        <table class="highlight z-depth-3">
          <thead class="teal lighten-2">
            <tr>
              <th class="center" width="600px">Event</th>
              <th class="">Location</th>
              <th class="">Time</th>
            </tr>
          </thead>
          <tbody class="teal lighten-5" style="cursor:pointer">
          <tr>
            <td></td>
            <td>dfoif</td>
            <td>dfoif</td>
          </tr>
          <tr>
            <td>dfoif</td>
            <td>dfoif</td>
            <td>dfoif</td>
          </tr>
          <tr>
            <td>dfoif</td>
            <td>dfoif</td>
            <td>dfoif</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-4">
    <div class="showAlert"></div>
      <div id="calendar" class="white mt-3 p-2 z-depth-2" style="max-height:600px !important"></div>
<!-- <input class="wardPresent" style="display:non"> -->
<!-- <input class="wardAbsent" style="display:non"> -->
    </div>
  </div>  
<input class="presestud" style="display:none">
<input class="abstud" style="display:none">
<input class="wks" style="display:none">
<input class="mon" style="display:none">
<input class="tuse" style="display:none">
<input class="wed" style="display:none">
<input class="thur" style="display:none">
<input class="fri" style="display:none">
</div>
<script src="scripts/index.js"></script>
<script>
  var parentCanvas = document.getElementById('parentCanvas').getContext('2d');
  var parentCanvasAttd = new Chart(parentCanvas, {
      type: 'bar',
      data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            datasets: []
      },
      options: {
          responsive: true,
          legend: {
              display: true,
          },
          title: {
              display: true,
              text: "Ward's Attendance Record For Last Week"
          },
          scales: {
              x: {
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: "Day's Of The Week"
                  }
              },
              y: {
                  display: true,
                  scaleLabel: {
                      display: true,
                      labelString: "Number Of Student's"
                  }
              }
          }
      }
  });
  var wardName  = ["Banana", "Orange", "Apple", "Mango"];
  colorPick =["#0099999f","#FF6384","#C3D69B","#F48024","#EA7379","#5EBA7D","#FDB000"];
  var i = 0;
  $.ajax({
      type: 'get',
      url: 'parentWards.php',
      cache: false,
      success: function(returnData) {
          console.log(returnData);
      }
  });
  parentCanvasAttd.config.data.datasets
  setInterval(() => {
    while (wardName[i]){
      parentCanvasAttd.config.data.datasets[i].label=wardName[i];
      parentCanvasAttd.config.data.datasets[i].backgroundColor=colorPick[i];
      parentCanvasAttd.update();
      i++;
    }
  }, 300);
</script>
<script>
  var wards = document.getElementById('today2').getContext('2d');
  var wardsAttd = new Chart(wards, {
      type: 'doughnut',
      data: {
          datasets: [{
              data: [2,9],
              backgroundColor: [
                  window.chartColors.green,
                  window.chartColors.red,
              ]
          }],
          labels: [
              'Present',
              'Absent',
          ]
      },
      options: {
          responsive: true,
          legend: {
              position: 'right',
          },
          title: {
              display: false,
              text: 'Chart.js Doughnut Chart'
          },
          animation: {
              animateScale: true,
              animateRotate: true
          }
      }
  });
  // console.log(wardsAttd.config.data.datasets[0].data);
</script>
<script>
  var ctc = document.getElementById('today').getContext('2d');
  var tsc = new Chart(ctc, {
      type: 'doughnut',
      data: {
          datasets: [{
              data: [0,0,0,0,0],
              backgroundColor: [
                  window.chartColors.green,
                  window.chartColors.red,
              ]
          }],
          labels: [
              'Present',
              'Absent',
          ]
      },
      options: {
          responsive: true,
          legend: {
              position: 'right',
          },
          title: {
              display: false,
              text: 'Chart.js Doughnut Chart'
          },
          animation: {
              animateScale: true,
              animateRotate: true
          }
      }
  });
  // ;
  setInterval(() => {
  $presentN=$('.presestud').val();
  $abtsN=$('.abstud').val();
  $mon=$('.mon').val();
  $tuse=$('.tuse').val();
  $wed=$('.wed').val();
  $thur=$('.thur').val();
  $fir=$('.fri').val();
  chart.config.data.datasets[0].data[0]=$mon;
  chart.config.data.datasets[0].data[1]=$tuse;
  chart.config.data.datasets[0].data[2]=$wed;
  chart.config.data.datasets[0].data[3]=$thur;
  chart.config.data.datasets[0].data[4]=$fir;
  tsc.config.data.datasets[0].data[0]=$abtsN;
  tsc.config.data.datasets[0].data[1]=$presentN;
  tsc.update();
  chart.update();
  student.update();
  }, 300);
</script>

