<?php $child = 'viewsub'; $page = 'Subjects'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:1;">
    <div class="container flow-text center ">
        <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
        All Subject
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
<div class="main_body" style="margin-left:280px;">
    <div class="row justify-content-center mt-5">
        <div class="z-depth-2 white" style="width:500px;margin-top:15px;border-radius:3px;">
            <?php 
                include_once 'DBconnect.php';
                $check=mysqli_query($pcon,"SELECT * FROM subjectlist");
                $nrow=mysqli_num_rows($check);
                if($nrow > 0){?>
                    <p class="center flow-text">Subject List Teacher</p>
                <table class="table table-bordered table-striped" style="margin:0px;">
                    <tr>
                        <th class="center">NO.</th>
                        <th class="center">Subject (Class)</th>
                        <th class="center">Teacher</th>
                    </tr>
                    <?php
                        $useNum=0;
                        while ($nrows = mysqli_fetch_array($check)){
                            $use = $nrows['subjects'];
                            $use1 = $nrows['teacher'];
                            ?>
                                <tr>
                                    <th><?php echo ++$useNum;?></th>
                                    <th><?php echo $use;?><span class="right"><i class="fa fa-gem teal-text" style="cursor:pointer"></i></span></th>
                                    <?php
                                        if($use1 == 'null'){
                                            ?>
                                                <th>This Subject Has Not Been Allocated Yet</th>
                                            <?php
                                        }else{
                                            ?>
                                                <th><?php echo $use1;?><span class="right"><i class="fa fa-comments teal-text" style="font-size:22px;cursor:pointer"></i></span></th>
                                            <?php
                                        }
                                    ?>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
                <?php
                }else{
                    echo '<p class="center flow-text" style="padding-top:10px">There is no subject yet for this class </p>';
                }
            ?>
        </div>
    </div>
</div>
              