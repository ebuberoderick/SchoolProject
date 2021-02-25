<ul class="collection with-header z-depth-2" style="margin:0px;">
    <?php
    include_once 'DBconnect.php';
        $getStudent=mysqli_query($pcon,"SELECT * FROM parentinfo");
        while($checkstudent=mysqli_fetch_array($getStudent)){
            $fullName = $checkstudent['surName'].' '.$checkstudent['firstName'].' '.$checkstudent['otherName'];
            ?>
                <form action="MsgBox.php" method="get" style="margin:0px;padding:0px;">
                    <button type="submit" name="mail" value="<?php echo $checkstudent['maillAddress']?>"  style="display:none"></button>
                    <li class="collection-item avatar" style="padding-bottom:0px;max-height:1px !important;cursor:pointer">
                        <img src="/parentImage/<?php echo $checkstudent[10]?>" class="circle mt-2 showpic" alt="Profile image">
                        <div class="mmssgg">
                            <span class="title"><?php echo $fullName?></span>
                            <p class="grey-text truncate">Lorem ipsum dolor, sit amet !</p>
                            <p class="grey-text truncate">Active: 2 day ago</p>
                            <a href="" class="secondary-content">
                                <i class="badge teal white-text">17</i>
                            </a>
                        </div>
                        
                    </li>
                </form>
            <?php
        }
    ?>
</ul>
<script>
    $('.mmssgg').on('click',function(){
        $(this).parent().siblings().click()
    });
    $('.showpic').materialbox({});
</script>